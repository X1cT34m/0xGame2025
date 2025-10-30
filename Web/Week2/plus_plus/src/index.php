<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>你需要加加加</title>
</head>
<body>
    oioioioioioioioi
</body>

<!--?0xGame-->

</html>

<?php
error_reporting(0);
if (isset($_GET['0xGame'])) {
    highlight_file(__FILE__);
}
if (isset($_POST['web'])) {
    $web = $_POST['web'];
    if (strlen($web) <= 120) {
        if (is_string($web)) {
            if (!preg_match("/[!@#%^&*:'\-<?>\"\/|`a-zA-BD-GI-Z~\\\\]/", $web)) {
                eval($web);
            } else {
                echo("NONONO!");
            }
        } else {
            echo "No String!";
        }
    } else {
        echo "too long!";
    }
}
?>
