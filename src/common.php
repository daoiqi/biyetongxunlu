<?php


function is_get() { return ! is_post(); }
function is_post() {
	//return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';//看看这个的效率如何
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}


$debug = $_GET['debug'];
function debug($value='debug'){
    global $debug;
    if($debug){
        print_r( "<textarea style='width:600px;height:200px'>".$value."</textarea>");
    }
}




?>