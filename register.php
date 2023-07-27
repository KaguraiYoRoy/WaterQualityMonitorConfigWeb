<?php

$defaults = array(
	'interval'=>1800,
	'ua'=>'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1 QualityMonitor'
);

$api = $_REQUEST['api'];
$code = $_REQUEST['code'];
$nick = $_REQUEST['nick'];
$oled = $_REQUEST['oled'];
$ua = strlen($_REQUEST['ua'])==0?$defaults['ua']:$_REQUEST['ua'];
$interval = strlen($_REQUEST['interval'])==0?$defaults['interval']:intval($_REQUEST['interval']);

$verurl = "$api?code=" . filter($code) . "&nick=" . filter($nick);

$config = json_decode(file_get_contents($verurl));

if(!array_key_exists("result", $config)){
	die("Error: Config parse error!");
}

if($config->result!=0) {
	die("Error: ".$config->msg);
}

$token = $config->token;
$cronurl = $config->cron;
$uploadurl = $config->upload;

$result = array("API"=>$api,"Code"=>$code,"Nick"=>$nick,"Token"=>$token,"CronURL"=>$cronurl,"UploadURL"=>$uploadurl,"UA"=>$ua,"Interval"=>$interval,"UseOled"=>($oled == 1 ? true : false),"LogFile"=>"monitor.$nick.log");

file_put_contents("../config.json",json_encode($result));

if(file_exists("../pid")){
	$pid=intval(file_get_contents("../pid"));
	system("kill $pid");
}

echo "<h1>Settings update successful!</h1><br><h2>Administration token: $token</h2><br>This token will be used for later management. Please keep it properly, or you will need to register again.";

function filter($str)
{
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '(', "", $str);
    $str = str_replace( ')', "", $str);
    $str = str_replace( 'CR', "", $str);
    $str = str_replace( 'ASCII', "", $str);
    $str = str_replace( 'ASCII 0x0d', "", $str);
    $str = str_replace( 'LF', "", $str);
    $str = str_replace( 'ASCII 0x0a', "", $str);
    $str = str_replace( ',', "", $str);
    $str = str_replace( '%', "", $str);
    $str = str_replace( ';', "", $str);
    $str = str_replace( 'eval', "", $str);
    $str = str_replace( 'open', "", $str);
    $str = str_replace( 'sysopen', "", $str);
    $str = str_replace( 'system', "", $str);
    $str = str_replace( '$', "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( 'ASCII 0x08', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace("", "", $str);
    $str = str_replace("&gt", "", $str);
    $str = str_replace("&lt", "", $str);
    $str = str_replace("<SCRIPT>", "", $str);
    $str = str_replace("</SCRIPT>", "", $str);
    $str = str_replace("<script>", "", $str);
    $str = str_replace("</script>", "", $str);
    $str = str_replace("select","",$str);
    $str = str_replace("join","",$str);
    $str = str_replace("union","",$str);
    $str = str_replace("where","",$str);
    $str = str_replace("insert","",$str);
    $str = str_replace("delete","",$str);
    $str = str_replace("update","",$str);
    $str = str_replace("like","",$str);
    $str = str_replace("drop","",$str);
    $str = str_replace("DROP","",$str);
    $str = str_replace("create","",$str);
    $str = str_replace("modify","",$str);
    $str = str_replace("rename","",$str);
    $str = str_replace("alter","",$str);
    $str = str_replace("cas","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace(">","",$str);
    $str = str_replace("<","",$str);
    $str = str_replace(" ",chr(32),$str);
    $str = str_replace(" ",chr(9),$str);
    $str = str_replace("    ",chr(9),$str);
    $str = str_replace("&",chr(34),$str);
    $str = str_replace("'",chr(39),$str);
    $str = str_replace("<br />",chr(13),$str);
    $str = str_replace("''","'",$str);
    $str = str_replace("css","'",$str);
    $str = str_replace("CSS","'",$str);
    $str = str_replace("<!--","",$str);
    $str = str_replace("convert","",$str);
    $str = str_replace("md5","",$str);
    $str = str_replace("passwd","",$str);
    $str = str_replace("password","",$str);
    $str = str_replace("../","",$str);
    $str = str_replace("./","",$str);
    $str = str_replace("Array","",$str);
    $str = str_replace("or 1='1'","",$str);
    $str = str_replace(";set|set&set;","",$str);
    $str = str_replace("`set|set&set`","",$str);
    $str = str_replace("--","",$str);
    $str = str_replace("OR","",$str);
    $str = str_replace('"',"",$str);
    $str = str_replace("*","",$str);
    $str = str_replace("-","",$str);
    $str = str_replace("+","",$str);
    $str = str_replace("/","",$str);
    $str = str_replace("=","",$str);
    $str = str_replace("'/","",$str);
    $str = str_replace("-- ","",$str);
    $str = str_replace(" -- ","",$str);
    $str = str_replace(" --","",$str);
    $str = str_replace("(","",$str);
    $str = str_replace(")","",$str);
    $str = str_replace("{","",$str);
    $str = str_replace("}","",$str);
    $str = str_replace(".","",$str);
    $str = str_replace("response","",$str);
    $str = str_replace("write","",$str);
    $str = str_replace("|","",$str);
    $str = str_replace("`","",$str);
    $str = str_replace(";","",$str);
    $str = str_replace("etc","",$str);
    $str = str_replace("root","",$str);
    $str = str_replace("//","",$str);
    $str = str_replace("!=","",$str);
    $str = str_replace("$","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace("&&","",$str);
    $str = str_replace("==","",$str);
    $str = str_replace("#","",$str);
    $str = str_replace("@","",$str);
    $str = str_replace("mailto:","",$str);
    $str = str_replace("CHAR","",$str);
    $str = str_replace("char","",$str);
    return $str;
}


?>
