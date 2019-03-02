<?php require_once 'fonction.php'; ?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>easyCloud</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="images/x-icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
	<header>
		<h1>EasyCloud<span><?php if (isset($_GET['file_type'])) { echo " - ".$_GET['file_type']."</span>"; } ?></h1>
	</header>
	<nav>
		<?php
		if (aff()) {
			$get_var = "?file_type=";

			$all_file = "";
			$image_file = $get_var."image";
			$audio_file = $get_var."audio";
			$video_file = $get_var."video";
			$doc_file = $get_var."document";

			$upload = "upload.php";
			$delete = "delete.php";
		}else {
			$all_file = "#";
			$image_file = "#";
			$audio_file = "#";
			$video_file = "#";
			$doc_file = "#";

			$upload = "#";
			$delete = "#";
		}
		?>
		<a class="a_button" href="index.php<?= $all_file ?>"><button class="button_file"><strong>All</strong></button></a>
		<a class="a_button" href="index.php<?= $image_file ?>"><button class="button_file"><strong>Image</strong></button></a>
		<a class="a_button" href="index.php<?= $audio_file ?>"><button class="button_file"><strong>Audio</strong></button></a>
		<a class="a_button" href="index.php<?= $video_file ?>"><button class="button_file"><strong>Video</strong></button></a>
		<a class="a_button" href="index.php<?= $doc_file ?>"><button class="button_file"><strong>Document</strong></button></a>
		<br><br>
		<a class="a_button" href="<?= $upload ?>"><button class="button_file"><strong>Upload</strong></button></a>
		<a class="a_button" href="<?= $delete ?>"><button class="button_file"><strong>Delete</strong></button></a>
	</nav>
	<div id="content">