<?php require "./elements/header.php"; ?>
	<?php
		if (aff()) {
			if (!isset($_GET['file_type']) || empty($_GET['file_type']) || $_GET['file_type'] == 'all') {
				show_all();
			} elseif ($_GET['file_type'] == 'image') {
				show_image();
			} elseif ($_GET['file_type'] == 'audio') {
				show_audio();
			} elseif ($_GET['file_type'] == 'video') {
				show_video();
			} elseif ($_GET['file_type'] == 'document') {
				show_doc();
			}
			
		} else { ?>
		<form method="POST">
			<!-- Access Password : --><input type="password" name="mdp" placeholder="Access Password"><br>
			<input type="submit" value="Access">
		</form>

		<a href="index.php" ><button id="access_cloud"><strong>ACCESS TO THE CLOUD</strong></button></a>
		<?php
			if (isset($_POST['mdp']) && in_array(sha1($_POST['mdp']), PARAM['access_mdp'])) {
				$_SESSION['mdp'] = sha1($_POST['mdp']);
				echo '<style type="text/css">form {display:none;} #access_cloud{display:initial;}</style>';
			}
		}
		?>
<?php require "./elements/footer.php"; ?>