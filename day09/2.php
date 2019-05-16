<?php
$dir = fopen('1.php', 'r');
$lien = '';
if ($dir) {
	while (!feof($dir)) {
		$lien .= '<p>'.fgets($dir).'</p>';
	}
}
fclose($dir);
echo $lien;
