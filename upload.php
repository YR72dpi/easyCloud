<?php require_once 'fonction.php'; ?>
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
		<form method="POST" action="" enctype="multipart/form-data">
			<?php if (aff()) { ?>
			<?php
				if (!empty(PARAM["upload_mdp"])) {
					echo '
					<input type="password" name="mdp" placeholder="Upload Password" /><br>
					';
					if (isset($_POST['mdp'])) {
						if (in_array(sha1($_POST['mdp']), PARAM["upload_mdp"])) {
							if (isset($_FILES['fichier'])) {
								if(!empty($_FILES['fichier']['name'][0])) {
									$can_upload = true;
								} else { echo "Select a file ! <br><br>"; }
							}
						} else { echo "Password Error"; }
					}
				} else {
					if (isset($_FILES['fichier'])){
						if (!empty($_FILES['fichier']['name'][0])) {
							$can_upload = true;
						} else { echo "Select a file ! <br><br>"; }
					} 
				}
			?>
			<?php } ?>

		<input name="fichier[]" id="fichier" type="file" multiple="" /><br>
		<input type="submit" value="Send file">

			<?php 
				if (isset($can_upload) && $can_upload) {
					//var_dump($_FILES);
						$total = count($_FILES['fichier']['name']);
						for( $i=0 ; $i < $total ; $i++ ) {
							$TailleMax = PARAM['max_file_size'];
							$file_name = $_FILES['fichier']['name'][$i];
							if ($_FILES['fichier']['size'][$i] <= $TailleMax) {
								$ExtensionUpload = strtolower(substr(strrchr($file_name, '.'), 1));
								$Chemin = DIR_FILE.date('dMY')."__".uniqid().".".$ExtensionUpload; /* $_FILES['fichier']['name'] */
								$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'][$i], $Chemin);
								if ($resultat) {
									if (PARAM['redirect_aft_upload']) {
										$retour = 'index.php';
										header('Location:'.$retour);
									} else {
										echo "<br><span style='color: green;''>".$file_name." uploaded ! </span>";
									}
								} else {
									echo "<br><span style='color: red;''>".$file_name." not uploaded ! </span>";
								}
							} else { echo $file_name." it's too heavy !";}
						}
					
				}
			?>
	</form>
	</div>
	<footer>
		<p>(c) EasyCloud - Powered by <strong>Dev IL</strong>. Cloud Open Source.</p>
	</footer>
</body>
</html>