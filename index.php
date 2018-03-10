<?php
/**
 * @Author: 苏羽羽
 * @Date:   2018-03-10 22:05:24
 * @E-mail: suyuyuc@gmail.com
 * @Blog: 	https://www.suyuyu.com
 * @Last Modified by:   苏羽羽
 * @Last Modified time: 2018-03-10 22:50:37
 */

require 'Scode.class.php';

$scode = new Scode();
if (isset($_POST['inputRes']) && !empty($_POST['inputRes'])) {
	$scode->inputRes = $_POST['inputRes'];
	var_dump($scode->checkScode());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>人类验证</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<p>人类验证：<?php echo $scode->setScode();?></p>
			<p>输入答案：<input type="text" name="inputRes"></p>
			<p><input type="submit"></p>
		</form>
	</div>
</body>
</html>