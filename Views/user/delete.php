<?php 
	require_once('../../config/default.php');
    require_once('../../config/Database.php');
    require_once('../../Http.php');

    $db = new \Database();
    $pdo = $db->getDb();

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE id = $id";

        if ($pdo->exec($sql)) {
            $message = "l'utilisateur a été supprimé";
        } else {
            $message = "Impossible de modifié cet élément";
        }
        
        $url = $base_url.'views/user';
        Http::redirectTo($url);
    }
?>
