<?php
@$dir = $_GET['dir'] ? $_GET['dir'] : "E:\www";
if (is_dir($dir)) {
	$handle = opendir($dir);
	while (($file = readdir($handle)) != false) {
		if ($file != '.' && $file != '..') {
			$fiels[] = $dir.'\/'.$file;
		}
		
	}
	closedir($handle);
} else {
	fopen($dir, 'r+');
}

// echo '<pre>';
// print_r($fiels);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>目录</td>
		</tr>
		<?php foreach ($fiels as $k => $v) :?>
		<tr>
			<td><a href="?dir=<?php echo $v?>"><?php echo $v?></a></td>
		</tr>
	<?php endforeach;?>
	</table>
</body>
</html>