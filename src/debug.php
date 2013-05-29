<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>毕业通讯录debug</title>
<meta description=""/>
<!-- <link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/pedia.css" rel="stylesheet" type="text/css" /> -->
<style>
#message{
	width:600px;
	height:200px;	
}
</style>
</head>
<body>
	<form action="wechat.php?debug=true" method="post" mimetype="text/xml" enctype="text/xml" >

		<div><textarea id="message" name="message">
 <xml>
 <ToUserName><![CDATA[gh_5bdd858508df]]></ToUserName>
 <FromUserName><![CDATA[oNluMjnAtV3TvEW0YY7hYLfB6Oml]]></FromUserName> 
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[this is a test]]></Content>
 <MsgId>1234567890123456</MsgId>
 </xml>
		</textarea></div>
		<button>提交</button>
	</form>
</body>
</html>