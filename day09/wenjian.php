<?php
// echo __DIR__,'<br>';
// echo __FILE__,'<br>';
// echo '<pre>';
// print_r(dir(__DIR__));
header('Content-type:text/html;charset=utf-8');
$dir =  dirname(__DIR__);
//扫描文件夹
// $file = scandir($dir);
function my_dir($dir){
	$files = array();
	if (is_dir($dir)) {
		if ($handle = opendir($dir)) {
			while (($file = readdir($handle)) != false) {
				if ($file != '.' && $file != '..') {
					if (is_dir($dir.'/'.$file)) {
						$files[$file] =my_dir($dir.'/'.$file);
					} else {
						$files[] = $dir.'/'.$file;
					}
					
				}
			}
		} else {
			return '失败';
		}
		closedir($handle);
	} else {
		return '失败';
	}
	
	return $files;
}

// echo $dir;
echo " <pre>";
print_r(my_dir($dir));
// var_dump(is_dir($dir));
// $variable = my_dir($dir);
// ?>
