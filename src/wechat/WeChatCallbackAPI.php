<?php

require_once( "wechat/WeChatTypeParse.php");

//定义微信的token
define("TOKEN", "weixintongxunludaoiqiandccz");

/**
 * 
 * 微信的调用api
 * @author d
 *
 */
class WeChatCallbackAPI{

	/**
	 * 微信消息返回
	 */
	private $wechatResponseMessage;

	/** 解析是文本、音频、图片、位置等信息*/
	private $weChatTypeParse;

	/**
	 * 一个正确的处理用户的消息的处理器 
	 * @var WeChatMessageHandler
	*/
	private $weChatMessageHandler;

	public function __construct(){
		
	}

	public function responseMessage(){
		//TODO log
		//file_put_contents("test.txt", $resultStr."\r\n", FILE_APPEND);
		echo $resultStr;
	}


	public function run($message){
		if (!empty($message)){
			//获得正确的类型处理器。有点类似获得一个工厂
			$this->weChatMessageHandler = WeChatTypeParse::getInstance()->parse($message);
			
			//获得正确的消息响应对象。产生正确的产品。并处理消息
			$this->weChatMessageHandler->doHandleMessage();
			
			//获得输出
			$str = $this->weChatMessageHandler->getResponseMessage();
			return $str;
		}else {
			return "";
		}
	}



	public function valid() {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    
private function checkSignature()	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	
}

?>