<?php


include_once( dirname(__FILE__)."/wechat/WeChatCallbackAPI.php");
include_once( dirname(__FILE__)."/common.php");


$weChatCallbackAPI = new WeChatCallbackAPI();

if(is_get()){
	$weChatCallbackAPI->valid();
}else{
	$message = $_GET['debug']?$_POST['message']:$GLOBALS["HTTP_RAW_POST_DATA"];
	$str = $weChatCallbackAPI->run($message);
	echo $str;
	file_put_contents("test.txt", $message."\r\n", FILE_APPEND);
	file_put_contents("test1.txt", $str."\r\n");
}

exit;



?>