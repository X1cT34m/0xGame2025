<?php
echo "<h1>Yakit && BurpSuite && HackBar 你自己选一个玩吧</h1>";
echo "<h2>或者你也可以选择其他的方法</h2>";
echo "<h2>Tech Otakus Save The World</h2>";
$flag = '0XGame{Congratuation_You_Are_Http_God!!!}';
if (!isset($_GET['hello']) && $_GET['hello'] != 'web') {
    die('<br>用GET传递 hello=web');
}
if (!isset($_POST['http']) && $_POST['http'] != 'good') {
    die('<br>用POST传递 http=good');
}
if (!isset($_COOKIE['Sean']) && $_COOKIE['Sean'] != 'god') {
    die('<br>设置cookie Sean=god');
}
if ($_SERVER['HTTP_USER_AGENT'] != 'Safari') {
    die('请使用Safari浏览器访问');
}
if ($_SERVER['HTTP_REFERER'] != 'www.mihoyo.com') {
    die('<br>请从www.mihoyo.com访问本页面,否则你的原石啊这些全都别想要了');
}
// if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1') {
//     die('<br>请从本地访问');
// }
if($_SERVER['HTTP_VIA'] != 'clash'){
    die('<br>请使用clash这只猫猫来代理一下');
}
echo $flag."<br>";
echo '<h1>HTTP协议的真理,你已解明!</h1>';