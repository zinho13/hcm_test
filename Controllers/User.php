<?php 
    require_once('../../config/default.php');
    require_once('../../config/Database.php');
    require_once('../../models/User.php');
    require_once('../../Http.php');

    /**
     * Filtre des donnée des champs textes
     * 
     */
    function input_validation($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // ================================================

    // Liste des utilisateurs

        $userModel = new User();
        $datas = [];

        $sql = "SELECT users.*, groupes.nom as groupe_nom FROM `users` JOIN `groupes` ON users.groupe_id=groupes.id";
        
        if ($users = $userModel->get_query($sql)) {
            
        } else {
            $message = "Auccun données disponible.";
        }

        $sql = "SELECT * FROM `groupes`";
        $userGroup =  $userModel->get_query($sql);
        
    // ================================================

    // Save new user

    if (isset($_POST['submit_user'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['email'])) {
            $data = [];
            $date = date("Y-m-d H:m:s");

            $data['id'] = NULL;
            $data['pseudo'] = input_validation($_POST['pseudo']);
            $data['email'] = input_validation($_POST['email']);
            $data['groupe_id'] = input_validation($_POST['groupe_id']);
            $data['date_creation'] = $date;
            $data['date_modif'] = $date;
            $isPseudo = $data['pseudo'];
            $isEmail = $data['email'];

            $isExist = $userModel->get_query("SELECT * FROM users WHERE pseudo = '$isPseudo' OR email = '$isEmail'");

            if (count($isExist) > 0) {
                $message = "Le pseudo ou l'adresse email existe déjà";
                $datas =  $data;
            } else {
                 if ($userModel->insert('users', $data)) {
                    $url = $base_url.'views/user';
                    $message = "élément enregistré avec succès";
                    Http::redirectTo($url);
                } else {
                    $url = $_SERVER['PHP_SELF'];
                    $message = "Impossible d'enregistrer cet élément";
                    header("Location: $url");
                }
            }
        } else {
            $message = "Veuillez remplissez les champs.";
        }
    }  
    
    // ================================================

        // Get user

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($users = $userModel->get_user('users', $id)) {
            } else {
                $message = "Cette utilisateur est introuvable";
            }
        }
    
    // ================================================

    // Modification d'un utilisateur

    if (isset($_POST['update_user'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['email'])) {
            $data = [];
            $id = $_POST['user_id'];
            $date = date("Y-m-d H:m:s");
            // var_dump($_POST['user_id']);
            // die();
            $data['id'] = NULL;
            $data['pseudo'] = input_validation($_POST['pseudo']);
            $data['email'] = input_validation($_POST['email']); 
            $data['groupe_id'] = input_validation($_POST['groupe_id']);
            $data['date_modif'] = $date;
            $isPseudo = $data['pseudo'];
            $isEmail = $data['email'];
            $isId = $_POST['user_id'];

            $isExist = $userModel->get_query("SELECT * FROM users WHERE id != '$isId' OR pseudo = '$isPseudo' OR email = '$isEmail' ");

            // if (count($isExist) > 0) {
            //     $message = "Le pseudo ou l'adresse email existe déjà";
            //     $datas =  $data;
            // } else {
                if ($userModel->update('users', $data, ['id' => $id])) {
                    $url = $base_url.'views/user';
                    $message = "élément modifié avec succès";
                    Http::redirectTo($url);
                } else {
                   $url = $_SERVER['PHP_SELF'];
                    $message = "Impossible de modifié cet élément";
                    header("Location: $url");
                }
            // }
        } else {
            $message = "Veuillez remplissez les champs.";
        }
    }
    
    // ================================================

    // Suppression d'un élément

    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];
    //     $sql = "DELETE FROM `users` WHERE id = $id";
        
    //     if ($userModel->exec($sql)) {
    //         $message = "l'utilisateur a été supprimé";
    //     } else {
    //         $message = "Impossible de modifié cet élément";
    //     }

    //     $url = $_SERVER['PHP_SELF'];
    //     Http::redirectTo($url);
    // }
