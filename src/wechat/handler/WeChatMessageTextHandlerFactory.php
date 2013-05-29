<?php

include_once(  dirname(__FILE__)."/WeChatMessageHandlerFactory.php");
include_once(  dirname(__FILE__)."/impl/Help.php");

class WeChatMessageTextHandlerFactory 
			extends  WeChatMessageHandlerFactory{
				

	
	/**
	 * 根据的用户的文本输入。返回正确的处理单元。
	 * @see src/wechat/handler/WechatMessageHandlerFactory::createMessageHandler()
	 */
	public function	createMessageHandler(){
		switch ($this->userMessage->Content) {
			case "查询班级":
				$this->handler = new Help();
				break;
	
			default://不识别的话，返回帮助信息
				$this->handler = new Help();
		}
		
		//为handle设置用户发送的消息。用户逻辑的处理
		$this->handler->setUserMessage($this->userMessage);
		return $this->handler;
		
		
	}
}

?>