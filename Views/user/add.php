<?php
    require_once('../../Controllers/User.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Création utilisateur</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
          <?= $message; ?>
      <?php endif; ?>
      <form method="post" action="">
        <div class="form-group">
          <label for="pseudo">Pseudo</label>
          <input type="text" name="pseudo" id="pseudo" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="type_user">Type d'utilisateur</label>
          <select name="groupe_id" id="type_user" class="form-control">
              <option value="1">Admin</option>
              <option value="2" selected>simple user</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="submit_user" class="btn btn-primary">Créer</button>
          <a class="btn btn-danger" href="<?= $base_url ?>/Views/user">Annuler</a>
        </div>
      </form>
    </div>
  </div>
</div>