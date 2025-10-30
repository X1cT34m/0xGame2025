<?php
error_reporting(0);
highlight_file(__FILE__);
$rce1 = $_GET['rce1'];
$rce2 = $_POST['rce2'];
$real_code = $_POST['rce3'];

$pattern = '/(?:\d|[\$%&#@*]|system|cat|flag|ls|echo|nl|rev|more|grep|cd|cp|vi|passthru|shell|vim|sort|strings)/i';

function check(string $text): bool {
    global $pattern;
    return (bool) preg_match($pattern, $text);
}


if (isset($rce1) && isset($rce2)){
    if(md5($rce1) === md5($rce2) && $rce1 !== $rce2){
        if(!check($real_code)){
            eval($real_code);
        } else {
            echo "Don't hack me ~";
        }
    } else {
        echo "md5 do not match correctly";
    }
}
else{
    echo "Please provide both rce1 and rce2";
}
?>