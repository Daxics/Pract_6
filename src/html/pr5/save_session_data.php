<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_session'])) {
	if (isset($_POST['color_theme'])) {
		if ($_POST['color_theme'] === "light") {
			$_SESSION['dark_color_theme'] = "false";
			$_SESSION['light_color_theme'] = "true";
		} elseif ($_POST['color_theme'] === "dark") {
			$_SESSION['dark_color_theme'] = "true";
			$_SESSION['light_color_theme'] = "false";
		}
	}

	if (isset($_POST['language'])) {
		if ($_POST['language'] === "rus") {
			$_SESSION['rus_lang'] = "true";
			$_SESSION['eng_lang'] = "false";
		} elseif ($_POST['language'] === "eng") {
			$_SESSION['rus_lang'] = "false";
			$_SESSION['eng_lang'] = "true";
		}
	}

	if (isset($_POST['username'])) {
		$_SESSION['username'] = $_POST['username'];
	}
	loadData();
}
?>