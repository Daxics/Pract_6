<?php
// header('Content-type: text/plain');
// echo "List of files:\n";
// echo shell_exec('ls');
// echo "\nList of processes:\n";
// echo shell_exec('ps');
// echo "\nYour username:\n";
// echo shell_exec('whoami');
// echo "\nYour id:\n";
// echo shell_exec('id');
?>

<html lang="en">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
	<body>
	<h1>Information and administrative web-page about the server</h1>
    <p><b>List of files:</b></p>
    <p><?php echo str_replace("\n", "<br>", shell_exec('ls')); ?></p>
    <p><b>List of processes:</b></p>
    <p><?php echo str_replace("\n", "<br>", shell_exec('ps aux')); ?></p>
    <p><b>Your username:</b></p>
    <p><?php echo str_replace("\n", "<br>", shell_exec('whoami')); ?></p>
    <p><b>Your id:</b></p>
    <p><?php echo str_replace("\n", "<br>", shell_exec('id')); ?></p>
</body>
</html>
