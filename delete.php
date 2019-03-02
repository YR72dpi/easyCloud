<?php require "./elements/header.php"; ?>
<?php if (aff()) { ?>
	<?php
		$can_delete = false;
        if (isset($_GET['this']) && !empty($_GET['this'])) {
        		if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
	        		if (in_array(sha1($_POST['mdp']), PARAM['delete_mdp'])) {
	        			$can_delete = true;
	        		}
        		}
        	?>
        	<form action="" method="POST">
				<input type="password" name="mdp" placeholder="Delete password"><br>
				<input type="submit" value="Delete">
				<?php 
					if(isset($can_delete) && $can_delete) {
						unlink(DIR_FILE.$_GET['this']);
	        			if (PARAM['redirect_aft_delete']) {
							$retour = 'delete.php';
							header('Location:'.$retour);
						} else {
							echo "<br><span style='color: green;''><strong>".$_GET['this']."</strong> deleted ! </span>";
						}
					}
				 ?>
			</form>
        	<?php
        } else {
        	// --------------
        	$dir = DIR_FILE;
	        //  si le dossier pointe existe
	        if (is_dir($dir)) {

	           // si il contient quelque chose
	           if ($dh = opendir($dir)) {

	               // boucler tant que quelque chose est trouve
	               while (($file = readdir($dh)) !== false) {
	                  $fileNotAff = array('.', '..');
	                   // affiche le nom et le type si ce n'est pas un element du systeme
	                  if (!in_array($file, $fileNotAff)) {
	                     echo "
	                      <tr>
	                        <td><a href='delete.php?this=$file' >$file</a><br />\n"."</td>
	                      </tr>
	                     ";
	                  }
	                    
	               }
	               // on ferme la connection
	               closedir($dh);
	           }
	        }
        	// --------------
        }
	?>
<?php } ?>
<?php require "./elements/footer.php"; ?>