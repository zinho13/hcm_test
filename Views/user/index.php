<?php
    require_once('../../Controllers/user.php');
    include('../header.php');

    require('../../autoloader.php');
    Autoloader::register();
?>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Liste des utilisateurs</h2>
      <a href="<?= $base_url ?>/Views/user/add.php" class="btn btn-sm btn-success bouton-create">Créer</a>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
          <?= $message; ?>
      <?php endif; ?>
      <table class="table table-striped">
            <thead>
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Type</th>
                <th width="180">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user):?>
                    <?php //var_dump((array)($user)); ?>
                    <tr>
                        <td hidden=""><?= $user->id ?></td>
                        <td><?= $user->pseudo ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->groupe_nom ?></td>
                        <td>
                        <a href="edit.php?editId=<?= $user->id ?>" class="btn btn-sm btn-info">Editer</a>
                        <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $user->id ?>" class='btn btn-sm btn-danger'>Supprimer</a>
                        <!-- <a onclick="return confirm('Are you sure you want to delete this entry?')" href="<?= $base_url ?>/controllers/User.php?id=<?= $user->id ?>&delete" class='btn btn-sm btn-danger'>Supprimer</a> -->
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
  </div>
</div>