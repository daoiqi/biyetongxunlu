<?php

/**
 * 
 * 消息的具体业务逻辑处理的工厂。
 * 该子类生成具体的消息逻辑处理单元实例。
 * @author d
 *
 */
abstract class WeChatMessageHandlerFactory{

	
	/**
	 * 
	 * 用户的发来的消息
	 * @var xml对象
	 */
	protected $userMessage;
	
	/**
	 * 
	 * 正确的逻辑处理单元
	 * @var WeChatMessageHandler
	 */
	protected $handler;
	
	/**
	 * 
	 * 创造业务逻辑处理单元的实例
	 * @return WeChatMessageHandler具体的对象
	 */
	public abstract function createMessageHandler();
	
	
	/**
	 * 
	 * 设置用户发送的消息。将来用户业务逻辑处理
	 * @param Array $usermessage
	 */
	public function setUserMessage($usermessage){
		$this->userMessage =$usermessage;
	}
	
}

?>