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
		<h1>EasyCloud</h1>
	</header>
	<nav>
		<?php
		if (aff()) {
			$get_var = "?file_type=";

			$all_file = "";
			$image_file = $get_var."image";
			$audio_file = $get_var."audio";
			$video_file = $get_var."video";
			$doc_file = $get_var."doc";

			$upload = "upload.php";
		}else {
			$all_file = "#";
			$image_file = "#";
			$audio_file = "#";
			$video_file = "#";
			$doc_file = "#";

			$upload = "#";
		}
		?>
		<a class="a_button" href="index.php<?= $all_file ?>"><button class="button_file"><strong>All</strong></button></a>
		<a class="a_button" href="index.php<?= $image_file ?>"><button class="button_file"><strong>Image</strong></button></a>
		<a class="a_button" href="index.php<?= $audio_file ?>"><button class="button_file"><strong>Audio</strong></button></a>
		<a class="a_button" href="index.php<?= $video_file ?>"><button class="button_file"><strong>Video</strong></button></a>
		<a class="a_button" href="index.php<?= $doc_file ?>"><button class="button_file"><strong>Document</strong></button></a>
		<!-- <br><br> -->
		<a class="a_button" href="<?= $upload ?>"><button class="button_file"><strong>Upload</strong></button></a>
	</nav>
	<div id="content">
	<?php if (aff()) { ?>
		<?php
		if (!empty(PARAM["upload_mdp"])) {
			echo '
			<form method="POST" action="" enctype="multipart/form-data">
			<!-- Upload password : --> <input type="password" name="mdp" placeholder="Upload Password" /><br>
			<!-- Avatar  : --><input type="file" name="fichier" /><br>
			<input type="submit" value="Send file">
			</form>
			';
			if (isset($_POST['mdp'])) {
				if (in_array(sha1($_POST['mdp']), PARAM["upload_mdp"])) {
					if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name'])) {
						$TailleMax = PARAM['max_file_size'];
						if ($_FILES['fichier']['size'] <= $TailleMax) {
								$Chemin = DIR_FILE.date('d-M-Y')."__".$_FILES['fichier']['name'];
								$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'], $Chemin);
								if ($resultat) {
									$retour = 'index.php';
									header('Location:'.$retour);
								} else { echo "Error"; }
						} else { echo "Your file size exceeds the authorized one.";}
					} else { echo "Select a file !"; }
				} else { echo "Password Error"; }
			}
		} else {
			echo '
			<form method="POST" action="" enctype="multipart/form-data">
			<!-- Avatar  : --><input type="file" name="fichier" /><br>
			<input type="submit" value="Send file">
			</form>
			';
			if (isset($_FILES['fichier'])){
				if (!empty($_FILES['fichier']['name'])) {
					$TailleMax = PARAM['max_file_size'];
					if ($_FILES['fichier']['size'] <= $TailleMax) {
						$Chemin = DIR_FILE.date('d-M-Y')."__".$_FILES['fichier']['name'];
						$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'], $Chemin);
						if ($resultat) {
							$retour = 'index.php';
							header('Location:'.$retour);
						} else { echo "Error"; }
					} else { echo "Your file size exceeds the authorized one.";}
				} else { echo "Select a file !"; }
			} 
		}
	?>
	<?php } ?>
	</div>
	<footer>
		<p>(c) EasyCloud - Powered by <strong>Dev IL</strong>. Cloud Open Source. SIMPLE cloud ! FREE cloud.</p>
	</footer>
</body>
</html>