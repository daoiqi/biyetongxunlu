<?php
include_once(  dirname(__FILE__)."/../WeChatMessageTextHandler.php");


/**
 * 
 * 程序的帮助查询。用户输入帮助时，输出帮助结果<br>
 * 命令：帮助/help
 * @author d
 *
 */
class Help extends WeChatMessageTextHandler{
	
	public function handleMessage(){
		$str = "感谢关注毕业通讯录";

		$str.= "查询";
		$str.= "\r\n";
		$str.= "帮助:\r\n";
		$str.= "帮助/help/bz";
		$str.="\r\n";
		return $str;
	}
}

?>