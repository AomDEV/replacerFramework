<?php
session_start();
require 'helper.php';
$helper = new replacer();
$helper->load("loader.php");
$helper->hideSection(array("test"));
$helper->sectionHTML(array("profile"=>"Section: <b>PROFILE</b>"));
$helper->render("test.php",true,array("name"=>"AOM"));

$helper->route("profile", $f=function(){
	$helper = new stat();
	$helper->render("profile.php");
});
?>