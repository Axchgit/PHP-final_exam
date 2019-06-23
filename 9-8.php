<!DOCTYPE html>
<?php
header("Content-type:text/html;charset=UTF-8");
$fn = urlencode("data.txt");
echo "<a href='downfile.php?filename=$fn'>下载文件</a>";
?>