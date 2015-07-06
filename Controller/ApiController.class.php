<?php
namespace Home\Controller;

use Think\Controller;

class ApiController extends PublicController {
    public function index(){
        $this->show("asda");
    }
    public function jscssmd5(){
    	Global $pdname;
		Global $envData;

		$pdname = array( 
    		'js'  => "", // 记录js
    		'css' => "" // 记录css
    	);
		$env         = I("session.env");
		$environment = C("environment");
		$envData     = $environment[$env];    // 记录环境对应文件

		// 拼接
		foreach ($envData as $key => $value) {
			$envData[$key]['js']  = C("this_d").$value['site'].$value['js'];
			$envData[$key]['css'] = C("this_d").$value['site'].$value['css'];
		}

		// $this->assign('list',$list);
		// 分析html
		function htmlFx(){
			$filename=[
				'js'=>[],
				'css'=>[]
			];
			$rs=array(
				"css"=>array(
					"preg"=>"/<link.+-->(.+)\.css\?v=.+/",
					"result"=>array()
				),
				"js"=>array(
					"preg"=>"/require\(\[[\'\"](.+)[\'\"]\]\)/",
					"result"=>array()
				)
			);
			$str=file_get_contents('D:/svncode/wap/trunk/webapp/m.feiniu.com/public/'.I("html"));

			foreach ($rs as $key => $value) {
				preg_match_all($value['preg'],$str,$value['result']);
				if(isset($value['result'][1])){
					foreach ($value['result'][1] as $key2 => $value2) {
						$filename[$key][]=trim($value2);
					}
				}
			}
			return $filename;
		}
		
		function fileRelate($value,$suffix){
			Global $pdname;
			Global $envData;
			$Tname     = &$pdname[$suffix];
			$Tname_val = &$Tname[$value];

			if($Tname!="" && $Tname_val=="") {

				$file_go  = $envData[0][$suffix]."/".$value.".".$suffix;
				$file_end = $envData[1][$suffix]."/".$value.".".$suffix;
				
				$Tname_val="false";
				if(file_exists($file_go) && file_exists($file_end)){
					$Tname_val=md5_file($file_go) == md5_file($file_end)?"true":"false";	
				}

				if($suffix=="js"){
					jsRelate($value,$suffix);
				}

			}
		}
		// 判断js的差异
		function jsRelate($filename,$suffix){
			Global $envData;

			$str=file_get_contents($envData[0]['js']."/".$filename.".js");
			preg_match("/require\(\[(.+)\]/",$str,$rs);
			if(!isset($rs[1])){
				preg_match("/define\(.+\[(.+)\]/",$str,$rs);
			}

			if(isset($rs[1])){
				$rs[1]=$filename.",".$rs[1];
				$strarr=explode(",",preg_replace("/['\" ]/","",$rs[1]));
				if($strarr){
					foreach ($strarr as $key => $value) {
						fileRelate($value,$suffix);
					}
				}
			}
		}

		if(I()){
			$filename =[
				'js'=>[],
				'css'=>[]
			];
			if(I("html")){
				$filename=htmlFx();	
			}
			if(count($filename['js'])){
				foreach ($filename['js'] as $key => $value) {
					fileRelate($value,"js");
				}
				asort($pdname["js"]);
			}
			if(count($filename['css'])){
				foreach ($filename['css'] as $key => $value) {
					fileRelate($value,'css');
				}
				asort($pdname["css"]);
			}

		}

		echo json_encode($pdname);
    }
    public function setenv(){
    	session("env",I('env'));
    	echo 1;
    }
    public function dir(){

    	function getFile($dir,$dir2="",$fileArray=array()) {
		    if (false != ($handle = opendir ( $dir.$dir2 ))) {
		        while ( false !== ($file = readdir ( $handle )) ) {
		            //去掉"“.”、“..”以及带“.xxx”后缀的文件
		            if ($file != "." && $file != "..") {
		            	// print_r($file."<br>");
		            	if(is_dir($dir.$file)){
		            		$fileArray=array_merge($fileArray,getFile($dir,$dir2.$file.'/'));
		            	}else{
		            		if(substr($file,-5)==".html"){
		            			$fileArray[]=$dir2.$file;
		            		}
		            	}
		                
		            }
		        }
		        //关闭句柄
		        closedir ( $handle );
		    }
		    return $fileArray;
		}
		$envData = C("environment")[I("session.env")][0];
		$fileData= getFile(C("this_d").$envData['site'].$envData['html']);
		
		$this->show(json_encode($fileData));
    }
}