<?php 
    require_once('../../config/default.php');
    require_once('../../config/database.php');
    require_once('../../Models/Filiere.php');

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

    // Lister les filières

    $filiereModel = new Filiere();

    $sql = "SELECT filieres.*, type_filieres.nom as type_nom FROM `filieres` JOIN `type_filieres` ON filieres.type_id=type_filieres.id";
    $filieres = $filiereModel->get_query($sql);

    $sql = "SELECT * FROM `type_filieres`";
    $typeFilieres =  $filiereModel->get_query($sql);

    // ================================================


    // Enregistrement d'un nouveau filière

    if (isset($_POST['submit_filiere'])) {
        $data = [];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['nom'] = input_validation($_POST['nom']);
        $data['code'] = input_validation($_POST['code']);
        $data['type_id'] = input_validation(isset($_POST['type_id']) ? $_POST['type_id'] : 2);
        $data['date_creation'] = $date;
        $data['date_modif'] = $date;
        
        if ($filiereModel->insert('filieres', $data)) {
            $url = $base_url.'/Views/filiere';
            $message = "élément enregistré avec succès";
            header("Location: $url");
        } else {
            $url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $message = "Impossible d'enregistrer cet élément";
            header("Location: $url");
        }
    } 

    // ================================================


    // Récuperation d\'un élément à modifier

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($filieres = $filiereModel->get_filiere('filieres', $id)) {
        } else {
            $message = "Filière indisponible";
        }
    }

    // ================================================


    // Sauvegarde des donnée modifiéé

    if (isset($_POST['update_filiere'])) {
        $data = [];
        $id = $_POST['filiere_id'];
        $date = date("Y-m-d H:m:s");

        $data['id'] = NULL;
        $data['nom'] = input_validation($_POST['nom']);
        $data['code'] = input_validation($_POST['code']); 
        $data['type_id'] = input_validation($_POST['type_id']);
        $data['date_modif'] = $date;

        if ($filiereModel->update('filieres', $data, ['id' => $id])) {
            $url = $base_url.'/Views/filiere';
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

    // if (isset($_GET['delete'])) {
    //     $id = $_GET['id'];
    //     $filiereModel = getPdo();
    //     $sql = "DELETE FROM `filieres` WHERE id = $id";
        
    //     if ($filiereModel->exec($sql)) {
    //         $url = $base_url.'/Views/filiere  ';
    //         $message = "élément supprimé avec succès";
    //         header("Location: $url");
    //     } else {
    //         return false;
    //     }
    // }
    
