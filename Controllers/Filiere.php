<?php 
    require_once('../../config/default.php');
    require_once('../../config/Database.php');
    require_once('../../models/Filiere.php');
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

    // Lister les filières

    $filiereModel = new Filiere();
    $datas = [];

    $sql = "SELECT filieres.*, type_filieres.nom as type_nom FROM `filieres` JOIN `type_filieres` ON filieres.type_id=type_filieres.id";

    if ($filieres = $filiereModel->get_query($sql)) {
            
    } else {
        $message = "Auccun données disponible.";
    }

    $sql = "SELECT * FROM `type_filieres`";
    $typeFilieres =  $filiereModel->get_query($sql);

    // ================================================


    // Enregistrement d'un nouveau filière

    if (isset($_POST['submit_filiere'])) {
        if (!empty($_POST['nom']) && !empty($_POST['code'])) {
            $data = [];
            $date = date("Y-m-d H:m:s");

            $data['id'] = NULL;
            $data['nom'] = input_validation($_POST['nom']);
            $data['code'] = input_validation($_POST['code']);
            $data['type_id'] = input_validation(isset($_POST['type_id']) ? $_POST['type_id'] : 2);
            $data['date_creation'] = $date;
            $data['date_modif'] = $date;
            $isFiliereName = $data['nom'];
            $isFiliereCode = $data['code'];

            $isExist = $filiereModel->get_query("SELECT * FROM filieres WHERE nom = '$isFiliereName' OR code = '$isFiliereCode'");

            if (count($isExist) > 0) {
                $message = "Le nom ou le code existe déjà";
                $datas =  $data;
            } else {
                if ($filiereModel->insert('filieres', $data)) {
                    $url = $base_url.'views/filiere';
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
        if (!empty($_POST['nom']) && !empty($_POST['code'])) {
            $data = [];
            $id = $_POST['filiere_id'];
            $date = date("Y-m-d H:m:s");

            $data['id'] = NULL;
            $data['nom'] = input_validation($_POST['nom']);
            $data['code'] = input_validation($_POST['code']); 
            $data['type_id'] = input_validation($_POST['type_id']);
            $data['date_modif'] = $date;
            $isFiliereCode = $data['code'];

            $isExist = $filiereModel->get_query("SELECT * FROM filieres WHERE nom = '$isFiliereName' OR code = '$isFiliereCode'");

            // if (count($isExist) > 0) {
            //     $message = "Le nom ou le code existe déjà";
            //     $datas =  $data;
            // } else {
                if ($filiereModel->update('filieres', $data, ['id' => $id])) {
                    $url = $base_url.'views/filiere';
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

    // if (isset($_GET['delete'])) {
    //     $id = $_GET['id'];
    //     $sql = "DELETE FROM `filieres` WHERE id = $id";
        
    //     if ($filiereModel->exec($sql)) {
    //         $message = "élément supprimé avec succès";
    //     } else {
    //         $message = "Impossible de modifié cet élément";
    //     }

    //      $url = $_SERVER['PHP_SELF'];
    //      Http::redirectTo($url);
    // }
    
