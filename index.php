<?php
ini_set("max_execution_time", "0");
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);
//生成静态页
define('HTML_PATH', './htm');//生成静态页面的文件位置
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单

if (isset($_GET['dir'])){ //config the basedir
    $basedir=$_GET['dir'];
}else{
    $basedir = '.';
}
$auto = 1;
checkdir($basedir);
function checkdir($basedir){
    if ($dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                if (!is_dir($basedir."/".$file)) {
//                    echo "filename
//$basedir/$file ".checkBOM("$basedir/$file")." <br>";
                }else{
                    $dirname = $basedir."/".$file;
                    checkdir($dirname);
                }
            }
        }
        closedir($dh);
    }
}
function checkBOM ($filename) {
    global $auto;
    $contents = file_get_contents($filename);
    $charset[1] = substr($contents, 0, 1);
    $charset[2] = substr($contents, 1, 1);
    $charset[3] = substr($contents, 2, 1);
    if (ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191) {
        if ($auto == 1) {
            $rest = substr($contents, 3);
            rewrite ($filename, $rest);
//            return ("<font color=red>BOM found, automatically removed.</font>");
        } else {
//            return ("<font color=red>BOM found.</font>");
        }
    }
//    else return ("BOM Not Found.");
}
function rewrite ($filename, $data) {
    $filenum = fopen($filename, "w");
    flock($filenum, LOCK_EX);
    fwrite($filenum, $data);
    fclose($filenum);
}
