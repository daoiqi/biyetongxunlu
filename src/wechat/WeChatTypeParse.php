<?php
include_once(  dirname(__FILE__)."/../common.php");
include_once(  dirname(__FILE__)."/handler/WeChatMessageTextHandlerFactory.php");


/**
 * 解析用户来的请求
 */
class WeChatTypeParse{

	/**
	 * 返回处理相关消息类型的对象
	 */
	public  function parse($value=''){
		//debug($value);
		$postObj = simplexml_load_string($value, 'SimpleXMLElement', LIBXML_NOCDATA);
        
        $type = $postObj->MsgType;
        
        switch($type){
        	case 'text':
        		$factory = WeChatMessageTextHandlerFactory::getInstance();
	        	$factory->setUserMessage($postObj);//用以下一步判断返回具体什么处理单元
	        	$handler = $factory->createMessageHandler();

	        	return $handler;
	        	
	        default:
	        	return ;
        }

       
	}



	/**
	 * WeChatTypeParse的单例模式
	 */
	private static $singleton = null;

	/**
	 * 获得WeChatTypeParse的单例模式。
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