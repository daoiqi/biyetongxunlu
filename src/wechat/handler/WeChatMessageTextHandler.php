<?php

//require_once( "WechatMessagehandler.php");
include_once( dirname(__FILE__). "/../response/WeChatResponseMessageFactory.php");
include_once(  dirname(__FILE__)."/WeChatMessageHandler.php");

/**
* 文本类型的处理类。。需要处理更多的业务逻辑。需要具体的类去实现
*/
abstract class WeChatMessageTextHandler extends WeChatMessageHandler{
	
	public function __construct(){
		
	}
	
	/**
	 * 
	 * 返回给用户的可理解的文本。即业务逻辑的结果
	 * @var string
	 */
	protected $content;
	
	protected function setContent($content){
		$this->content = $content;
	}
	
//	/**
//	 * 返回一个具体的逻辑单元的结果。即要返回给用户可见的信息。
//	 * @see src/wechat/handler/WeChatMessageHandler::handleMessage()
//	 */
//	protected abstract function handleMessage();
	

	/**
	 * 
	 * 对用户来的文本信息做处理
	 */
	public function doHandleMessage(){
		$this->preHandleMessage();
		$this->setContent($this->handleMessage());
		$this->posthandleMessage();
	}
	
	/**
	 * 在处理消息的时候，设置返回的类型
	 * @see src/wechat/handler/WeChatMessageHandler::preHandleMessage()
	 */
	protected function preHandleMessage(){
		$this->responseMessage = WeChatResponseMessageFactory::createWeChatResponseMessageInstance('text');
		
	}
	
	/**
	 * 给服务器发送的信息添加给用户的内容
	 * @see src/wechat/handler/WeChatMessageHandler::posthandleMessage()
	 */
	public function posthandleMessage(){
		//反多态
		$this->responseMessage->setToUserName($this->userMessage->FromUserName);
		$this->responseMessage->setFromUserName($this->userMessage->ToUserName);
		$this->responseMessage->setCreateTime(time());
		$this->responseMessage->setResponseMessage($this->content);
		$this->responseMessage->setFuncFlag(0);
		
	}
	
	
	
}


?>