<?php

include("db.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

//echo htmlspecialchars($_POST['domain']);
 if(isset($_GET['domain'])){

	$domain = $_GET['domain'];
	$email = $_GET['email'];
	//echo $domain .'---'. $email;
	if (isset($domain) && isset($email)) {

		$domain = makeSafeSQL($domain);
		$email = makeSafeSQL($email);

		$sql = 'INSERT INTO sites (domain, email) VALUES ("'.$domain.'", "'.$email.'")';
		excuteSQL($sql);
	}
 }

?>
<html>
	<head>
		<title>404Scanner</title>
		<link rel="stylesheet/less" type="text/css" href="style.less">
		<script type="text/javascript" src="less.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<div id="page-wrapper" class="container">
			<div class="header">
				<h3 class="text-muted">
					<a href="/">Scanner</a>
				</h3>
			</div>

			<div id="MainForm" class="jumbotron text-center">
				<h1>Scanner</h1>
				<p class="lead">Premium Online Broken Link Scanner</p>

				<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="GET">
					<input type="text" name="domain" placeholder="Domain" value="http://www.google.com" />
					<input type="text" name="email" placeholder="Email" value="Ole.Oldhoj@gmail.com"/>

					<input type="submit" value="scan">
				</form>
			</div>

			<div class="col-xs-12 text-center">
				<h3>Summary of Feature</h3>
				<p>Finding and fixing link problems has finally been made easy</p>
			</div>

			<div class="col-lg-6"></div>
			<div class="col-lg-6"></div>

		</div>

	</body>
</html>

<?php 
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 ?>