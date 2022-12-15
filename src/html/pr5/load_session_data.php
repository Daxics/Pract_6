<?php
function loadColorTheme() {
    if (isset($_SESSION['dark_color_theme']) && isset($_SESSION['light_color_theme'])) {
        if ($_SESSION['dark_color_theme'] === "true") {
            $_SESSION['css_path'] = "dark_theme_style.css";
        } else {
            $_SESSION['css_path'] = "light_theme_style.css";
        }
    } else {
        $_SESSION['css_path'] = "light_theme_style.css";
        $_SESSION['dark_color_theme'] = "false";
        $_SESSION['light_color_theme'] = "true";
    }
}

function loadUsername() {
    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = "Anonymous";
    }
}

function loadLanguage() {
    if (!isset($_SESSION['rus_lang']) && !isset($_SESSION['eng_lang'])) {
        $_SESSION['eng_lang'] = "true";
        $_SESSION['rus_lang'] = "false";
    }
}

function loadData() {
    loadColorTheme();
    loadUsername();
    loadLanguage();
}

loadData();
?>