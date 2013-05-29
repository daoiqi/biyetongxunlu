<?php

/**
 * 对微信的返回消息做一个抽象，是对文本消息、语音回复的一个抽象。
 * 使用WeChatResponseMessageFactory进行生成具体的实现。
 */
abstract class WeChatResponseMessage{
	protected $toUserName;//消息的接收者.OpenID
	protected $fromUserName;//消息的发送者，公众账号
	protected $createTime;//消息的创建时间
	protected $msgType;//消息的类型 "text","music","news"
	//protected $msgId;//消息的id。一般不用
	protected $funcFlag;//位0x0001被标志时，星标刚收到的消息。

	/**
	 * 设置消息的接受者
	 */
	public function setToUserName($toUserName){
		$this->toUserName = $toUserName;
	}

	/**
	 * 设置消息的发送者
	 */
	public function setFromUserName($fromUserName){
		$this->fromUserName = $fromUserName;
	}

	/**
	 * 设置消息的创建时间
	 */
	public function setCreateTime($createTime){
		$this->createTime = $createTime;
	}

	/**
	 * 设置消息的标志
	 */
	public function setFuncFlag($funcFlag){
		$this->funcFlag = $funcFlag;
	}

	/**
	 * 需要返回的消息的字符串
	 */
	public abstract function responseMessage();
}


?>