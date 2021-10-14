<?php 
  require_once('../../config/default.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="<?= $base_url ?>">Zidev</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>views/user">Utilisateur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>views/filiere">Filière</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>views/parcour">Parcour</a>
      </li>
    </ul>
  </div>
</nav>