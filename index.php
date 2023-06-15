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
		<table>
			<tr><td>服务器注册API地址: </td><td><input type="text" name="api" style="width:600px" <?php if($config != false)echo "value=\"$config->API\""; ?>></td></tr>
			<tr><td>注册码: </td><td><input type="text" name="code" style="width:600px" <?php if($config != false)echo "value=\"$config->Code\""; ?>></td></tr>
			<tr><td>设备代号: </td><td><input type="text" name="nick" style="width:600px" <?php if($config != false)echo "value=\"$config->Nick\""; ?>></td></tr>
			<tr><td>UA<sup>*</sup>: </td><td><input type="text" name="ua" style="width:600px" <?php if($config != false)echo " value=\"$config->UA\""; ?>></td></tr>
			<tr><td>上传间隔(s)<sup>*</sup>: </td><td><input type="number" name="interval" <?php if($config != false)echo "value=\"$config->Interval\""; ?>></td></tr>
			<tr><td>使用Oled显示屏 </td><td><input name="oled" type="checkbox" value=1 <?php if($config != false)echo $config->UseOled?"checked":"" ?>></td></tr>
		</table>
		<sup>*留空以使用缺省值</sup><br>
		<input type="submit" value="提交">
	</form>
</body>
<footer>
	<p>Copyright. ©2020-2023 iYoRoy Studio.
</footer>
</html>
