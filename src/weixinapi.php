<?php
/**
  * wechat php test
  */

include "common.php";

//define your token
define("TOKEN", "weixintongxunludaoiqiandccz");
$wechatObj = new wechatCallbackapiTest();


if(is_get()){
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}
//if($debug){file_put_contents("test1.txt", print_r($GLOBALS,true));}

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
            
        	exit;
        }
    }

    public function responseMsg()
    {global $debug;
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //debug($_SERVER['$HTTP_RAW_POST_DATA']);
        //debug($postStr);
        //file_put_contents("test.txt", $postStr."\r\n", FILE_APPEND);
      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>".
							"<ToUserName><![CDATA[%s]]></ToUserName>".
							"<FromUserName><![CDATA[%s]]></FromUserName>".
							"<CreateTime>%s</CreateTime>".
							"<MsgType><![CDATA[%s]]></MsgType>".
							"<Content><![CDATA[%s]]></Content>".
							"<FuncFlag>0</FuncFlag>".
							"</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "非常感谢关注毕业通讯录。现在功能开在开发中...很快就上线啦~~";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	file_put_contents("test.txt", $resultStr."\r\n", FILE_APPEND);
                    //debug($resultStr);
                    echo $resultStr;
                }else{
                    file_put_contents("test.txt", "Input something...");
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>