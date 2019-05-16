<?php

// 03_readdir.php

//读取文件夹下 所有子文件

function readDirectory($dir)
{
    $handle = opendir($dir); //打开文件夹

    //循环读取文件夹下内容
    while (($name = readdir($handle)) !== false) {
        if ($name != '.' && $name != '..') {
            $path = "$dir/$name";

            //如果是文件夹则搜索文件夹下的内容
            if (is_dir($path)) {
                //递归
                readDirectory($path);
            }

            //如果是文件,则打印出路径
            if (is_file($path)) {
                echo $path, '<br>';
                @mkdir('images');

                //如果路径是 png或jpg结尾的,则统一复制
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if ($ext == 'png' || $ext == 'jpg') {
                    //怕重名覆盖, 所以要手动制作唯一名称
                    $unique = microtime(true) . mt_rand(0, 1e9);
                    $unique = md5($unique);
                    $unique = "$unique.$ext";

                    copy($path, "images/$unique");
                }

            }
        }
    }

    closedir($handle); //关闭文件夹
}

readDirectory('E:/www');
