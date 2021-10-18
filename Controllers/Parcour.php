<?php 
    require_once('../../config/default.php');
    require_once('../../config/Database.php');
    require_once('../../models/Parcour.php');
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


    // Liste des parcours

    $parcourModel = new Parcour();
    $datas = [];

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
        $isParcourName = $data['nom'];
        $isParcourCode = $data['code'];

        $isExist = $parcourModel->get_query("SELECT * FROM parcours WHERE nom = '$isParcourName' OR code = '$isParcourCode'");

        if (count($isExist) > 0) {
            $message = "Le nom ou le code existe déjà";
            $datas =  $data;
        } else {
            if ($parcourModel->insert('parcours', $data)) {
                $url = $base_url.'views/parcour';
                $message = "élément enregistré avec succès";
                Http::redirectTo($url);
            } else {
                $url = $base_url.'views/create';
                $message = "";
                Http::redirectTo($url);
            }
        }
    }  
    
    // ================================================


    // Récupération d'un parcour

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        if ($parcours = $parcourModel->get_parcour('parcours', $id)) {
        } else {
            $message = "Parcour indisponible";
        }
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
        $isParcourName = $data['nom'];
        $isParcourCode = $data['code'];

        $isExist = $parcourModel->get_query("SELECT * FROM parcours WHERE nom = '$isParcourName' OR code = '$isParcourCode'");

        if (count($isExist) > 0) {
            $message = "Le nom ou le code existe déjà";
            $datas =  $data;
        } else {
            if ($parcourModel->update('parcours', $data, ['id' => $id])) {
                $url = $base_url.'views/parcour';
                $message = "élément modifié avec succès";
                Http::redirectTo($url);
            } else {
                $url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $message = "Impossible de modifié cet élément";
                header("Location: $url");
            }
        }
    }
    
    // ================================================


    // Supression d'un parcour

    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];
    //     $sql = "DELETE FROM `parcours` WHERE id = $id";
        
    //     if ($parcourModel->exec($sql)) {
    //         $message = "élément supprimé avec succès";
    //     } else {
    //         return false;
    //     }
    // }


