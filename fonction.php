<?php session_start();

// Constants
require_once "param.php";
define('DIR_FILE', "file/");

// Set up

if (!is_dir(DIR_FILE)) {
  mkdir(DIR_FILE);
}

// Function

function aff() {
	if (PARAM['EULA']) {
		if (empty(PARAM["access_mdp"])) {
			return true;
		} elseif (isset($_SESSION['mdp']) && in_array($_SESSION['mdp'], PARAM['access_mdp'])) {
			return true;
		} else {
			return false;
		}
	} else {
		echo "<p style='color: red;'><strong>/!\ EULA need to be TRUE on 'param.json' /!\ </strong></p>";
	}
}

function show_all() {
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
                        <td><a href='$dir$file' >$file</a><br />\n"."</td>
                      </tr>
                     ";
                  }
                    
               }
               // on ferme la connection
               closedir($dh);
           }
        }
}

function show_image() {
	$dir = DIR_FILE;
        //  si le dossier pointe existe
        if (is_dir($dir)) {

           // si il contient quelque chose
           if ($dh = opendir($dir)) {

               // boucler tant que quelque chose est trouve
               while (($file = readdir($dh)) !== false) {
                   // affiche le nom et le type si ce n'est pas un element du systeme
                  if (!in_array($file, ['.', '..'])) {
					$Extension_file = strtolower(substr(strrchr($file, '.'), 1));
					if (in_array($Extension_file, PARAM['ext_image'])) {
						 echo "
                      <tr>
                        <td><a href='$dir$file' >$file</a><br />\n"."</td>
                      </tr>
                     ";
					}
                  }
                    
               }
               // on ferme la connection
               closedir($dh);
           }
        }
}

function show_audio() {
	$dir = DIR_FILE;
        //  si le dossier pointe existe
        if (is_dir($dir)) {

           // si il contient quelque chose
           if ($dh = opendir($dir)) {

               // boucler tant que quelque chose est trouve
               while (($file = readdir($dh)) !== false) {
                   // affiche le nom et le type si ce n'est pas un element du systeme
                  if (!in_array($file, ['.', '..'])) {
					$Extension_file = strtolower(substr(strrchr($file, '.'), 1));
					if (in_array($Extension_file, PARAM['ext_audio'])) {
						 echo "
                      <tr>
                        <td><a href='$dir$file' >$file</a><br />\n"."</td>
                      </tr>
                     ";
					}
                  }
                    
               }
               // on ferme la connection
               closedir($dh);
           }
        }
}

function show_video() {
	$dir = DIR_FILE;
        //  si le dossier pointe existe
        if (is_dir($dir)) {

           // si il contient quelque chose
           if ($dh = opendir($dir)) {

               // boucler tant que quelque chose est trouve
               while (($file = readdir($dh)) !== false) {
                   // affiche le nom et le type si ce n'est pas un element du systeme
                  if (!in_array($file, ['.', '..'])) {
					$Extension_file = strtolower(substr(strrchr($file, '.'), 1));
					if (in_array($Extension_file, PARAM['ext_video'])) {
						 echo "
                      <tr>
                        <td><a href='$dir$file' >$file</a><br />\n"."</td>
                      </tr>
                     ";
					}
                  }
                    
               }
               // on ferme la connection
               closedir($dh);
           }
        }
}

function show_doc() {
	$dir = DIR_FILE;
        //  si le dossier pointe existe
        if (is_dir($dir)) {

           // si il contient quelque chose
           if ($dh = opendir($dir)) {

               // boucler tant que quelque chose est trouve
               while (($file = readdir($dh)) !== false) {
                   // affiche le nom et le type si ce n'est pas un element du systeme
                  if (!in_array($file, ['.', '..'])) {
					$Extension_file = strtolower(substr(strrchr($file, '.'), 1));
					if (in_array($Extension_file, PARAM['ext_docum'])) {
						 echo "
                      <tr>
                        <td><a href='$dir$file' >$file</a><br />\n"."</td>
                      </tr>
                     ";
					}
                  }
                    
               }
               // on ferme la connection
               closedir($dh);
           }
        }
}
?>