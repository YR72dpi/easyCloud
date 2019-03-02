<?php require "./elements/header.php"; ?>
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
								$Chemin = DIR_FILE.time()."_".$_FILES['fichier']['name'][$i]; /* $_FILES['fichier']['name'] */
								//var_dump($_FILES['fichier']);
								$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'][$i], $Chemin);
								if ($resultat) {
									if (PARAM['redirect_aft_upload']) {
										$retour = 'index.php';
										header('Location:'.$retour);
									} else {
										echo "<br><span style='color: green;''><strong>".$file_name."</strong> uploaded ! </span>";
									}
								} else {
									echo "<br><span style='color: red;''><strong>".$file_name."</strong> not uploaded ! </span>";
								}
							} else { echo $file_name." it's too heavy !";}
						}
					
				}
			?>
	</form>
<?php require "./elements/footer.php"; ?>