<?php
	session_start();
	// if($_GET){
	// 	if($_GET['env']){
	// 		$_SESSION['env']=$_GET['env'];
	// 	}
	// }
	// if(!$_SESSION['env']){
		$_SESSION['env']='dev->test';
	// }

	function getDir($dir) {
	    $dirArray[]=NULL;
	    if (false != ($handle = opendir ( $dir ))) {
	        $i=0;
	        while ( false !== ($file = readdir ( $handle )) ) {
	            //去掉"“.”、“..”以及带“.xxx”后缀的文件
	            if ($file != "." && $file != ".."&&!strpos($file,".")) {
	                $dirArray[$i]=$file;
	                $i++;
	            }
	        }
	        //关闭句柄
	        closedir ( $handle );
	    }
	    return $dirArray;
	}

	function getFile($dir) {
	    $fileArray[]=NULL;
	    if (false != ($handle = opendir ( $dir ))) {
	        $i=0;
	        while ( false !== ($file = readdir ( $handle )) ) {
	            //去掉"“.”、“..”以及带“.xxx”后缀的文件
	            if ($file != "." && $file != ".."&&strpos($file,".")) {
	                $fileArray[$i]=$file;
	                if($i==100){
	                    break;
	                }
	                $i++;
	            }
	        }
	        //关闭句柄
	        closedir ( $handle );
	    }
	    return $fileArray;
	}
	
	$this_d="D:/svncode/wap/";
	$environment=array(
		'dev->test' =>array(
			array(
				'site' => '/trunk/webapp/m.feiniu.com/',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css/'
			),
			array(
				'site'=>'/tags/testv1/webapp/m.feiniu.com/',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css/'
			)
		),
		'test->preview'=>array(
			array(
				'site'=>'/tags/testv1/webapp/m.feiniu.com/',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css-build/'
			),
			array(
				'site'=>'/release/',
				'js' => '/onlinejs01/js/',
				'css'=> '/online01/touch_brancheonline/touch_20150112/public/static/css-build/'
			)
		)
	);
	
	$pdjsname = array();
	$pdcssname = array();
	$filename =array(
		'js'=>array(),
		'css'=>array()
	);
	// 分析html
	function htmlFx(){
		global $filename;
		$rs=array(
			"css"=>array(
				"preg"=>"/<link.+-->(.+)\?v=.+/",
				"result"=>array()
			),
			"js"=>array(
				"preg"=>"/require\(\[[\'\"](.+)[\'\"]\]\)/",
				"result"=>array()
			)
		);
		// $str=file_get_contents($site);
		$str=file_get_contents('D:/svncode/wap/trunk/webapp/m.feiniu.com/public/'.$_GET['html']);

		foreach ($rs as $key => $value) {
			preg_match_all($value['preg'],$str,$value['result']);
			if(isset($value['result'][1])){
				foreach ($value['result'][1] as $key2 => $value2) {
					$filename[$key][]=trim($value2);
				}
			}
		}
	}
	function cssRelate($value){
		global $pdcssname;
		global $this_d;
		global $environment;
		$env=$environment[$_SESSION['env']];
		$dev_css=$this_d.$env[0]['site'].$env[0]['css']."/".$value;
		$test_css=$this_d.$env[1]['site'].$env[1]['css']."/".$value;
		// echo ((md5_file($dev_js) == md5_file($test_js)?"true ":"false" )."----------".$value."<br>");
		if(empty($pdcssname[$value])){
			if(file_exists($dev_css) && file_exists($test_css)){
				$pdcssname[$value]=md5_file($dev_css) == md5_file($test_css)?"true":"false";	
			}else{
				$pdcssname[$value]="false";
			}
		}
	}
	// 判断js的差异
	function jsRelate($filename){
		global $this_d;
		global $environment;
		// $filename1 = "test1.txt";
		// $md5file = md5_file($filename) == md5_file($filename1)?"true":"false";
		// printf($this_d.$environment['dev']['site'].$environment['dev']['js']."/".$filename.".js");
		$env=$environment[$_SESSION['env']];
		$str=file_get_contents($this_d.$env[0]['site'].$env[0]['js']."/".$filename.".js");
		preg_match("/require\(\[(.+)\]/",$str,$rs);
		if(!isset($rs[1])){
			preg_match("/define\(.+\[(.+)\]/",$str,$rs);
		}
		if(isset($rs[1])){
			$rs[1]=$filename.",".$rs[1];
			$strarr=explode(",",preg_replace("/['\" ]/","",$rs[1]));
			if($strarr){
				foreach ($strarr as $key => $value) {
					jsMd5($value);
				}
			}
		}
	}
	// Js的Md5码对比
	function jsMd5($value){
		global $pdjsname;
		global $this_d;
		global $environment;
		$env=$environment[$_SESSION['env']];
		$dev_js=$this_d.$env[0]['site'].$env[0]['js']."/".$value.".js";
		$test_js=$this_d.$env[1]['site'].$env[1]['js']."/".$value.".js";

		// echo ((md5_file($dev_js) == md5_file($test_js)?"true ":"false" )."----------".$value."<br>");
		if(empty($pdjsname[$value])){
			if(file_exists($dev_js) && file_exists($test_js)){
				$pdjsname[$value]=md5_file($dev_js) == md5_file($test_js)?"true":"false";	
			}else{
				$pdjsname[$value]="false";
			}
			jsRelate($value);
		}
	}
	

	$pps=array(
		'js'=>"",
		'css'=>""
	);
	if($_GET){
		
		if($_GET["html"]){
			htmlFx();	
		}
		
		if(count($filename['js'])){
			foreach ($filename['js'] as $key => $value) {
				jsMd5($value);
			}
			asort($pdjsname);
			$pps["js"]=$pdjsname;
		}
		if(count($filename['css'])){
			foreach ($filename['css'] as $key => $value) {
				cssRelate($value);
			}
			asort($pdcssname);
			$pps["css"]=$pdcssname;
		}

	}
	echo json_encode($pps);
	

?>