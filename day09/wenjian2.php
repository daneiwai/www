<?php
//递归删除
function removeDir($dir)
{
    //1.遍历目录下的所有内容, 删除掉这些内容
    $handle = opendir($dir);

    while (($name = readdir($handle)) !== false) {
        if ($name != '.' && $name != '..') {
            $path = "$dir/$name";

            //是文件
            if (is_file($path)) {
                unlink($path);
            }
            //是文件夹
            if (is_dir($path)) {
                removeDir($path); //递归
            }
        }
    }

    closedir($handle);

    //2.删除掉内容以后再删除文件夹
    rmdir($dir);
}

removeDir('E:\www\xuexiyuanma\CRMEB_WeChatMiniProgram');