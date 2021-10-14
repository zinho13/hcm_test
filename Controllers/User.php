<?php 
    require_once('../../config/default.php');
    require_once('../../config/database.php');
    require_once('../../Models/User.php');

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

    // function index()
    // {
        $userModel = new User();

        $sql = "SELECT users.*, groupes.nom as groupe_nom FROM `users` JOIN `groupes` ON users.groupe_id=groupes.id";
        $users = $userModel->get_query($sql);
        
    // ================================================

    // Save new user

    if (isset($_POST['submit_user'])) {
        $data = [];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['pseudo'] = input_validation($_POST['pseudo']);
        $data['email'] = input_validation($_POST['email']);
        $data['groupe_id'] = input_validation($_POST['groupe_id']);
        $data['date_creation'] = $date;
        $data['date_modif'] = $date;
        
        if ($userModel->insert('users', $data)) {
            $url = $base_url.'/Views/user';
            $message = "élément enregistré avec succès";
            header("Location: $url");
        } else {
            $url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $message = "Impossible d'enregistrer cet élément";
            header("Location: $url");
        }
    }  
    
    // ================================================

        // function get_update()
        // {
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
        $data = [];
        $id = $_POST['user_id'];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['psudo'] = input_validation($_POST['pseudo']);
        $data['email'] = input_validation($_POST['email']); 
        $data['groupe_id'] = input_validation($_POST['groupe_id']);
        $data['date_modif'] = $date;

        if ($userModel->update('users', $data, ['id' => $id])) {
            $url = $base_url.'/Views/user';
            $message = "élément modifié avec succès";
            header("Location: $url");
        } else {
            $url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $message = "Impossible de modifié cet élément";
            header("Location: $url");
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

    //     $url = $base_url.'/Views/user';
    //     header("Location: $url");
    // }
