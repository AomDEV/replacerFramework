<?php
$indecator = array(

"PHP_VERSION" => phpversion(),
"REQUEST_TIME"=> $_SERVER["REQUEST_TIME"],
"REMOTE_ADDR"=> $_SERVER["REMOTE_ADDR"],
"REMOTE_PORT"=> $_SERVER["REMOTE_PORT"],
"SERVER_NAME"=> $_SERVER["SERVER_NAME"],
"PHP_SELF"=>$_SERVER["PHP_SELF"],
"HTTP_USER_AGENT"=>$_SERVER["HTTP_USER_AGENT"],
"REQUEST_URI"=> $_SERVER["REQUEST_URI"],
"DOCUMENT_ROOT" => $_SERVER["DOCUMENT_ROOT"],
"REQUEST_METHOD" => $_SERVER["REQUEST_METHOD"],
"SERVER_PROTOCOL" => $_SERVER["SERVER_PROTOCOL"],
"SERVER_SOFTWARE" => $_SERVER["SERVER_SOFTWARE"],
"HTTP_ACCEPT" => $_SERVER["HTTP_ACCEPT"],
"HTTP_HOST" => $_SERVER["HTTP_HOST"],
"HTTP_ACCEPT_ENCODING" => $_SERVER["HTTP_ACCEPT_ENCODING"],
"SERVER_ADMIN" => $_SERVER["SERVER_ADMIN"],
"SERVER_PORT" => $_SERVER["SERVER_PORT"],

);
?>