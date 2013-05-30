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
		$content = trim($this->userMessage->Content);//去除多余的空格

		$handlerName = self::$HANDLERS[ $this->getCommand($content) ];

		$class=new ReflectionClass($handlerName);    //建立 命令 的反射类
		$this->handler = $class->newInstance(); //赋值
		
		//为handle设置用户发送的消息。用户逻辑的处理
		$this->handler->setUserMessage($this->userMessage);
		return $this->handler;
		
		
	}

	/**
	 * 获得用户的命令，具体的参数由实际的业务逻辑单元处理
	 */ 
	protected function getCommand($content){
		
		//获得空格前的命令
		$cmd = (strpos($content,' ') < 0) ? $content :
			 	substr( $content , 0, strpos($content,' '));


		switch ($cmd) {
			case '班级':
			case 'bj'  :
				return 'class';

			case '帮助':
			case 'help':
				return 'help';
			
			default:
				return 'help';
		}
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

	
	/**
	 * 相关的业务逻辑单元。采用反射动态生成具体的实例
	 */
	private static $HANDLERS = array(
			'help' => "Help",
			'class' => "ListClass"
		);


}

?>