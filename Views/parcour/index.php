<?php
    require_once('../../config/default.php');
    require_once('../../Controllers/Parcour.php');
    include('../header.php');

    // if (isset($_GET['delete'])) {
    //         $id = $_GET['id'];
    //         $pdo = getPdo();
    //         $sql = "DELETE FROM `parcours` WHERE id = $id";
            
    //         if ($pdo->exec($sql)) {
    //             $url = $base_url.'/Views/parcour';
    //             $message = "élément supprimé avec succès";
    //             header("Location: $url");
    //         } else {
    //             return false;
    //         }
    //     }
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Liste des parcours </h2>
      <a href="<?= $base_url ?>/Views/parcour/add.php" class="btn btn-sm btn-success bouton-create">Créer</a>
    </div>
    <div class="card-body">
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
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>
