<?php
	
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
	
	// $this_d=getcwd()."/../../../../..";
	// $a=getFile("D:/");
	echo json_encode(getFile("D:/svncode/wap/trunk/webapp/m.feiniu.com/public/"));
	// print_r();
	// $dir = "../";  //要获取的目录
	// // echo "********** 获取目录下所有文件和文件夹 ***********<hr/>";
	// //先判断指定的路径是不是一个文件夹
	// if (is_dir($dir)){
	// 	if ($dh = opendir($dir)){
	// 		while (($file = readdir($dh))!= false){
	// 			//文件名的全路径 包含文件名
	// 			$filePath = $dir.$file;
	// 			//获取文件修改时间
	// 			$fmt = filemtime($filePath);
	// 			echo "<span style='color:#666'>(".date("Y-m-d H:i:s",$fmt).")</span> ".$filePath."<br/>";
	// 		}
	// 		closedir($dh);
	// 	}
	// }
?>