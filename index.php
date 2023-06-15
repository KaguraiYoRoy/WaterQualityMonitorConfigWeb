<?php
$config = file_get_contents("../config.json");
if($config != false)
	$config = json_decode($config);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>OrangePi WaterMonitor Config</title>
</head>
<body>
	<h1>OrangePi Water Monitor Config</h1>
	<form action="register.php" method="post">
		<sup>*</sup>服务器注册API地址: <input type="text" name="api" <?php if($config != false)echo "value=\"$config->API\""; ?>><br>
		<sup>*</sup>注册码: <input type="text" name="code" <?php if($config != false)echo "value=\"$config->Code\""; ?>><br>
		<sup>*</sup>设备代号: <input type="text" name="nick" <?php if($config != false)echo "value=\"$config->Nick\""; ?>><br>
		UA: <input type="text" name="ua" <?php if($config != false)echo " value=\"$config->UA\""; ?>><br>
		上传间隔(s): <input type="number" name="interval" <?php if($config != false)echo "value=\"$config->Interval\""; ?>><br>
		<input name="oled" type="checkbox" value=1 <?php if($config != false)echo $config->UseOled?"checked":"" ?>>使用Oled显示屏<br>
		<sup>*：必填项<br>其余各项除Oled显示屏开关外留空以使用缺省值</sup><br>
		<input type="submit" value="提交">
	</form>

</body>
<footer>
	<p>Copyright. ©2020-2023 iYoRoy Studio.
</footer>
</html>
