<?php 
    require_once('../../config/default.php');
    require_once('../../config/database.php');
    require_once('../../Models/Parcour.php');

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


    // Liste des parcours

    $parcourModel = new Parcour();

    $sql = "SELECT parcours.*, filieres.nom as filiere_nom FROM `parcours` JOIN `filieres` ON parcours.filiere_id=filieres.id";
    $parcours = $parcourModel->get_query($sql);

    $sql = "SELECT * FROM `filieres`";
    $filieres = $parcourModel->get_query($sql);

    // ================================================


    // Enregistrement d'un nouveau parcours

    if (isset($_POST['submit_parcour'])) {
        $data = [];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['nom'] = input_validation($_POST['nom']);
        $data['code'] = input_validation($_POST['code']);
        $data['filiere_id'] = input_validation($_POST['filiere_id']);
        $data['date_creation'] = $date;
        $data['date_modif'] = $date;

        if ($parcourModel->insert('parcours', $data)) {
            $url = $base_url.'/Views/parcour';
            $message = "élément enregistré avec succès";
            header("Location: $url");
        } else {
            $url = $base_url.'/Views/create';
            $message = "";
            header("Location: $url");
        }
    }  
    
    // ================================================


    // Récupération d'un parcour

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $parcours = $parcourModel->get_parcour('parcours', $id);
        // if ($parcours = $parcourModel->get_parcour('users', $id)) {
        // } else {
        //     $message = "Cette utilisateur est introuvable";
        // }
    }
    
    // ================================================


    // Modification d'un parcour

    if (isset($_POST['update_parcour'])) {
        $data = [];
        $id = $_POST['parcour_id'];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['nom'] = input_validation($_POST['nom']);
        $data['code'] = input_validation($_POST['code']); 
        $data['filiere_id'] = input_validation($_POST['filiere_id']);
        $data['date_modif'] = $date;

        if ($parcourModel->update('parcours', $data, ['id' => $id])) {
            $url = $base_url.'/Views/parcour';
            $message = "élément modifié avec succès";
            header("Location: $url");
        } else {
            $url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $message = "Impossible de modifié cet élément";
            header("Location: $url");
        }
    }
    
    // ================================================


    // Supression d'un parcour

    // if (isset($_GET['delete'])) {
    //     $id = $_GET['id'];
    //     // $pdo = getPdo();
    //     $sql = "DELETE FROM `parcours` WHERE id = $id";
        
    //     if ($pdo->exec($sql)) {
    //         $url = $base_url.'/Views/parcour';
    //         $message = "élément supprimé avec succès";
    //         header("Location: $url");
    //     } else {
    //         return false;
    //     }
    // }


