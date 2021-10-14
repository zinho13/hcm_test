<?php 
	require_once('../../config/default.php');
    require_once('../../config/database.php');
    require_once('../../Http.php');

 	$db = new \Database();
    $pdo = $db->getDb();

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `parcours` WHERE id = $id";
        $pdo->exec($sql);

        $url = $base_url.'/Views/parcour';
        Http::redirectTo($url);
    }
?>
