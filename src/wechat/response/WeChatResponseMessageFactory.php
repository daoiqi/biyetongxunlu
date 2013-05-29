<?php
include_once(  dirname(__FILE__)."/WeChatResponseTextMessage.php");


/**
 * 
 * 微信返回消息的工厂。
 * 可以生成4个消息返回的对象。文本、音频
 * @author d
 *
 */
class WeChatResponseMessageFactory{
	
	/**
	 * 
	 * 创建响应消息的具体实例。
	 */
	public static function createWeChatResponseMessageInstance($type){
		switch($type){
			case 'text':
				return new WeChatResponseTextMessage();
			default:
				return new WeChatResponseTextMessage();;
		}
	}

}


?>