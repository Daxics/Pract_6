<?php
if(!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('Europe/Moscow');
include_once 'load_session_data.php';
include_once 'save_session_data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="dark_theme_style.css" />
	<title>Practice 5</title>
	<style>
		<?php echo file_get_contents($_SESSION['css_path']);
		?>
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
</body>
<div class="container" style="margin-top: 24px">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "<h1> Your file is too large </h1>";
    } elseif ($_FILES["fileToUpload"]["error"] > 0) {
        echo "<h1>During file uploading an error was caught: </h1>" . $_FILES["fileToUpload"]["error"];
    } elseif (!in_array($_FILES['fileToUpload']['type'], ['application/pdf'])) {
        echo "<h1>File is not PDF</h1>";
    } elseif (isset($_FILES["fileToUpload"]['name'])){
        $connect = new mysqli("db", "user", "password", "appDB");
        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        move_uploaded_file($file_tmp, "./download/" . $file_name);

        $query = "insert into uploaded_files(name, type, size, upload_date) values ('";
        $query = $query . $_FILES["fileToUpload"]["name"] . "', '" . $_FILES["fileToUpload"]["type"] . "', '" . $_FILES["fileToUpload"]["size"] . "', STR_TO_DATE(\"" . date("Y-m-d H:i:s") . "\", \"%Y-%m-%d %H:%i:%s\"));";
        $result = mysqli_query($connect, $query);
        echo "<h1> Upload succesfully </h1>";
    } else {
        echo $_FILES["fileToUpload"];
    }

    echo "<br> <h2><a href='index.php' class='link-primary'> Back </a></h2> ";
}

?>
</div>
</body>
</html>