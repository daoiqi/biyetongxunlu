<?php

include_once(  dirname(__FILE__)."/WeChatMessageHandlerFactory.php");
include_once(  dirname(__FILE__)."/impl/Help.php");
include_once(  dirname(__FILE__)."/impl/ListClass.php");

/**
 * 对用户来的文本消息生成具体的响应对象的工厂。
 * 此类是一个单例模式，需要调用getInstance()获得实例
 * @author d
 */
class WeChatMessageTextHandlerFactory 
			extends  WeChatMessageHandlerFactory{
				

	
	/**
	 * 根据的用户的文本输入。返回正确的处理单元。
	 * @see src/wechat/handler/WechatMessageHandlerFactory::createMessageHandler()
	 */
	public function	createMessageHandler(){
		$cmd = $this->userMessage->Content;

		switch ($cmd) {
			case "班级":
				$this->handler = new ListClass();
				break;
	
			default://不识别的话，返回帮助信息
				$this->handler = new Help();
		}
		
		//为handle设置用户发送的消息。用户逻辑的处理
		$this->handler->setUserMessage($this->userMessage);
		return $this->handler;
		
		
	}

	/**
	 * WeChatMessageTextHandlerFactory的单例模式
	 */
	private static $singleton = null;

	/**
	 * 获得WeChatMessageTextHandlerFactory的单例模式。
	 */
	public static function getInstance(){
		if( !(self::$singleton instanceof self) ) { 
        	self::$singleton = new self(); 
		} 
		return self::$singleton; 
	}

	private function __construct(){}



}

?>