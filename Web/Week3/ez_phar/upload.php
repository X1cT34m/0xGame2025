<?php
error_reporting(0);
$White_List = array("jpg", "png", "pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] && in_array($extension, $White_List)))
{
    $content=file_get_contents($_FILES["file"]["tmp_name"]);
    $pos = strpos($content, "__HALT_COMPILER();");
    if(gettype($pos)==="integer")
    {
        die("你猜我想让你干什么喵");
    }
    else
    {
        if (file_exists("./upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " Already exists. ";
        }
        else
        { 
            $file = fopen("./upload/".$_FILES["file"]["name"], "w");
            fwrite($file, $content); 
            fclose($file);
            echo "Success ./upload/".$_FILES["file"]["name"];
        }
    }
}
else
{ 
    echo "请重新尝试喵"; 
} 
?>