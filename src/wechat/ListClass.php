<?php

include_once(dirname(__FILE__)."/WeChatResponseTextMessage.php");
class ListClass extends WeChatResposeTextMessage{
	public function handleTransition(){
		//业务逻辑
		//TODO

		//返回
		$this->setResponse("ddd");//
	}
}

?>