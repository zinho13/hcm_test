<?php 
	require_once('../../config/default.php');
    require_once('../../config/database.php');

    $db = new \Database();
    $pdo = $db->getDb();

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE id = $id";
        $pdo->exec($sql);

        $url = $base_url.'/Views/user';
        header("Location: $url");
    }
?>
