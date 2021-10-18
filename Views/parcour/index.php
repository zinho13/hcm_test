<?php
    require_once('../../config/default.php');
    require_once('../../controllers/Parcour.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Liste des parcours </h2>
      <a href="<?= $base_url ?>views/parcour/add.php" class="btn btn-sm btn-success bouton-create">Créer</a>
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
             <th>Filière</th>
             <th width="180">Actions</th>
           </tr>
           <?php foreach($parcours as $parcour): ?>
             <tr>
               <td hidden=""><?= $parcour->id; ?></td>
               <td><?= $parcour->nom; ?></td>
               <td><?= $parcour->code; ?></td>
               <td><?= $parcour->filiere_nom; ?></td>
               <td>
                 <a href="edit.php?id=<?= $parcour->id ?>&edit" class="btn btn-sm btn-info">Editer</a>
                 <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $parcour->id ?>&delete" class='btn btn-sm btn-danger'>Supprimer</a>
                 <!-- <a onclick="return confirm('Are you sure you want to delete this entry?')" href="<?= $base_url ?>/controllers/parcour.php?id=<?= $parcour->id ?>&delete" class='btn btn-sm btn-danger'>Supprimer</a> -->
               </td>
             </tr>
           <?php endforeach; ?>
         </table>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>
