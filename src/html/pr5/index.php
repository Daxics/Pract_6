<?php
session_start();
include_once 'upload.php';
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

<body>
	<div class="container">
		<div style="margin: 0 0 30px 0">
			<h1>Configurations</h1>
				<form action="index.php" method="post">
					<div class="row" style="width: 160px">
						<div class="col">
							<input class="form-check-input" type="radio" id="light_theme" name="color_theme"
								value="light" <?php if ($_SESSION['light_color_theme']==="true") {echo "checked";} ?>>
							<label class="form-check-label" for="light_theme">Light</label>
						</div>
						<div class="col">
							<input class="form-check-input" type="radio" id="dark_theme" name="color_theme" value="dark"
								<?php if ($_SESSION['dark_color_theme']==="true") {echo "checked";} ?>>
							<label class="form-check-label" for="dark_theme">Dark</label>
						</div>
					</div>
					<div class="row" style="width: 160px">
						<div class="col">
							<input class="form-check-input" type="radio" id="rus_lang" name="language" value="rus" <?php
								if     ($_SESSION['rus_lang']==="true") {echo "checked";} ?>>
							<label for="rus_lang">Rus</label>
						</div>
						<div class="col">
							<input class="form-check-input" type="radio" id="eng_lang" name="language" value="eng" <?php
								if     ($_SESSION['eng_lang']==="true") {echo "checked";} ?>>
							<label for="eng_lang">Eng</label>
						</div>
					</div>
					<div class="input-group" style="width: 240px; margin: 8px 0 8px 0">
						<span class="input-group-text" id="inputGroup-sizing-default">Username</span>
						<input type="text" class="form-control" id="username" name="username" maxlength="20" size="20" value=<?php echo
						    	$_SESSION['username']; ?>>
					</div>
					<button class="btn btn-primary" type="submit" name="save_session">Save</button>
				</form>
			<?php
            if ($_SESSION['rus_lang'] === "true") {
	            echo '<h2 style="margin-top: 8px;"> Привет, ' . $_SESSION['username'] . '</h2>';
            } else {
	            echo '<h2 style="margin-top: 8px;"> Hello, ' . $_SESSION['username'] . '</h2>';
            }
            ?>
		</div>

		<div style="margin: 0 0 30px 0">
			<h1>Upload PDF</h1>
			<form action="upload.php" method="post" enctype="multipart/form-data" style="width: 400px;">
				<input class="form-control" type="file" name="fileToUpload" accept=".pdf" required>
				<button class="btn btn-primary" type="submit" name="upload" style="margin-top: 8px;">Upload</button>
			</form>
		</div>

		<div style="margin: 0 0 30px 0">
		<h1>Files:</h1>
		<table class='table' style="width: 70%;">
			<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Filename</th>
				<th scope="col">Size</th>
				<th scope="col">Upload date</th>
				<th scope="col">Link</th>
			</tr>
			</thead>
			<tbody>
			<?php
            $connect = new mysqli("db", "user", "password", "appDB");
            $result = $connect->query("SELECT * FROM uploaded_files");
            foreach ($result as $row) {
	            echo "<tr><th scope='row'>{$row['id']}</th>
				<td>{$row['name']}</td><td>{$row['size']}</td>
				<td>{$row['upload_date']}</td>
				<td><a href='download/pdf_file.php?id={$row['id']}' target='_blank'>Download</a></td>
				<td><a href='#' class='link-primary' onclick=deleteFile({$row['id']})>Delete</a></td></tr>";
            }
            ?>
			</tbody>
		</table>
		</div>
	</div>

<script src="./main.js"></script>
</body>

</html>