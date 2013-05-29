<?php 

/**
 * 微信的消息处理。进行业务逻辑处理
 */
abstract class WeChatMessageHandler{
	
	
	/**
	 * 
	 * 消息的返回对象。目前就4种的返回对象
	 * @var WeChatResponseMessage
	 * @see WeChatResponseMessage
	 */
	protected $responseMessage;
	
	/**
	 * 
	 * 用户的消息。有文本、语音、位置
	 * @var array
	 */
	protected $userMessage;

	public function __construct(){
		
	}
	
	public function setUserMessage($userMessage){
		$this->userMessage =$userMessage; 
	}


	/**
	 * 根据不同的类型的handler处理不同的信息。有文本、图片、位置等
	 */
	protected  abstract function handleMessage();
	
	protected abstract function preHandleMessage();
	
	protected abstract function posthandleMessage();
	
	/**
	 * 
	 *  对用户来的消息做处理
	 *  需要重写。具体看情况实现
	 *  preHandleMessage();
	 *  handleMessage();
	 *  posthandleMessage();
	 */
	public abstract  function doHandleMessage();

	
	/**
	 * 
	 * 获得消息的返回结果
	 * @return String 要返回的字符串
	 */
	public function getResponseMessage(){
		return $this->responseMessage->responseMessage();
	}
}



?>