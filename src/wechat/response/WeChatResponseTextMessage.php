<?php
// define('__ROOT__', dirname(dirname(__FILE__))); 
include_once(  dirname(__FILE__)."/WeChatResponseMessage.php");


/*
 * 定义消息回复的模版
 */
define(textTemplate, "<xml>".
						"<ToUserName><![CDATA[%s]]></ToUserName>".
						"<FromUserName><![CDATA[%s]]></FromUserName>".
						"<CreateTime>%s</CreateTime>".
						"<MsgType><![CDATA[%s]]></MsgType>".
						"<Content><![CDATA[%s]]></Content>".
						"<FuncFlag>%d</FuncFlag>".
					"</xml>");

/**
 * 回复文本消息
 */
class WeChatResponseTextMessage extends WeChatResponseMessage{

	public function __construct(){
		$this->msgType = "text";	  
	}

	/**
	 * 	文本消息的回复模版
	 */
	private static $textTemplate =textTemplate;


	protected $content;//回复的消息内容,长度不超过2048字节

	public function responseMessage(){
		$this->msgType = 'text';
		
		$resultStr = sprintf(self::$textTemplate, 
							$this->toUserName, 		$this->fromUserName, 
							$this->createTime, 				$this->msgType, 
							$this->content ,			0);
		return $resultStr;
	}

	
	/**
	 * 
	 * 设置需要返回的Content
	 * @param stirng $response
	 */
	public function setResponseMessage($content){
		$this->content = $content;
	}

//	/**
//	 * 根据具体的用户的关键字做业务逻辑处理。需要返回一个WeChatResponseTextMessage类型的对象。
//	 * 子类型是必须的。
//	 * 决定response的具体返回内容。
//	 */
//	public function handleTransition(){
//		if("查询班级" == $this->content){
//			$class  = new ListClass();
//			$var = $class->handleTransition();
//			return $var;
//		}
//	}

}


?>