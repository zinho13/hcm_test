<?php
    require_once('../../controllers/User.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modification utilisateur</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
          <?= $message; ?>
      <?php endif; ?>
      <form method="post" action="">
        <?php foreach($users as $user):?>
            <input type="hidden" name="user_id" value="<?= isset($user->id) ? $user->id : '' ?>">
            <div class="form-group">
               <label for="pseudo">Pseudo</label>
               <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?= isset($user->pseudo) ? $user->pseudo : '' ?>">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" value="<?= isset($user->email) ? $user->email : '' ?>">
            </div>
            <div class="form-group">
               <label for="type_user">Type d'utilisateur</label>
               <select name="groupe_id" id="type_user" class="form-control">
                   <option value="1">Admin</option>
                   <option value="2" selected>simple user</option>
               </select>
            </div>
            <div class="form-group">
               <button type="submit" name="update_user" class="btn btn-primary">Mettre à jour</button>
               <a class="btn btn-danger" href="<?= $base_url ?>views/user">Annuler</a>
            </div>
         <?php endforeach ?>
      </form>
    </div>
  </div>
</div>