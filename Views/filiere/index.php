<?php
    require_once('../../config/default.php');
    require_once('../../controllers/Filiere.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Liste des filières </h2>
      <a href="<?= $base_url ?>views/filiere/add.php" class="btb btn-sm btn-success bouton-create">Créer</a>
    </div>
    <div class="card-body">
         <?php if(!empty($message)): ?>
            <div class="">
                <?= $message; ?>
            </div>
         <?php else: ?>
            <table class="table table-striped">
              <tr>
                <th>Nom</th>
                <th>Code</th>
                <th>Type</th>
                <th width="180">Action</th>
              </tr>
              <?php foreach($filieres as $filiere): ?>
                <tr>
                  <td hidden=""><?= $filiere->id; ?></td>
                  <td><?= $filiere->nom; ?></td>
                  <td><?= $filiere->code; ?></td>
                  <td><?= $filiere->type_nom; ?></td>
                  <td>
                    <a href="edit.php?id=<?= $filiere->id ?>&edit" class="btn btn-sm btn-info">Editer</a>
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $filiere->id ?>" class='btn btn-sm btn-danger'>Supprimer</a>
                    <!-- <a onclick="return confirm('Are you sure you want to delete this entry?')" href="<?= $base_url ?>/controllers/filiere.php?id=<?= $filiere->id ?>&delete" class='btn btn-sm btn-sm btn-danger'>Supprimer</a> -->
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
         <?php endif; ?>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>
