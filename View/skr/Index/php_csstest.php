<?php
/** 
 * php php_csstest.php
*/
header("Content-type: text/html; charset=utf-8");

// echo "当前环境：local test \n";
$cssDir = 'D:/svncode/wap/tags/testv1/webapp/m.feiniu.com/public/static/css';
$destDir = 'D:/svncode/wap/tags/testv1/webapp/m.feiniu.com/public/static/css-build/';


function compress($str) {  
    /* remove comments */
    $str = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $str);  
    /* remove tabs, spaces, newlines, etc. */  
    $str = str_replace(array("\r\n", "\r", "\n", "\t", '  ','    ', '     '), ' ', $str); 
    $str = preg_replace( '#\s{2,}#',' ', $str );
    return $str;  
}

function getCssFileList($cssDir) {
	$cssDir = rtrim($cssDir, '\\/') . '/';
	$fileList = array(); //array('源css文件', '源css文件2'...));
	if(is_dir($cssDir)) {
		$dh = opendir($cssDir);
		 while (($file = readdir($dh)) !== false) {
			 if($file!='.' && $file  !='..') {
				 if(is_dir($cssDir.$file)) {
					$fileList2 = getCssFileList($cssDir.$file);
					$fileList = array_merge($fileList, $fileList2);
				 } else {
					 if(getFileExt($file) == 'css') {
						$fileList[] =  $cssDir . $file;
					 }
				 }
			 }
        }
        closedir($dh);
	}
	return $fileList;
}


function getFileExt($file) {
	$ext = '';
	if(!$file) {
		return $ext;
	}
	$parts = explode(".", $file);
    if (is_array($parts) && count($parts) > 1) {
        $ext = end($parts);
	}
	return $ext;
}
$fileList = getCssFileList($cssDir);
// var_export($fileList);
// echo "<br>\n";
if(is_array($fileList)) {
	foreach($fileList as $k=>$srcFile) {
		$v = str_replace(str_replace('\\', '\/', $cssDir), '', str_replace('\\', '\/', $srcFile));
		// echo '压缩后的css：' . $v . "<br>\n";
		$outFile = rtrim($destDir, '\\/') . '/' . $v;
		if(file_exists($srcFile)) {
			$str = compress(file_get_contents($srcFile));
			$outDir = dirname($outFile);
			is_dir($outDir) || mkdir($outDir, 0777, true);
			file_put_contents($outFile,$str);
		}
	}
}

echo 1;
