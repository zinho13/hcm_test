<?php
    require_once('../../controllers/Parcour.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modification parcour</h2>
    </div>
    <div class="card-body">
        <?php if(!empty($message)): ?>
          <?= $message; ?>
        <?php endif; ?>
    <form action="" method="post">
      <?php foreach($parcours as $parcour):?>
            <input type="hidden" name="parcour_id" value="<?= isset($parcour->id) ? $parcour->id : '' ?>">
        <div class="form-group">
            <label for="nom">Nom </label>
            <input type="text" name="nom" id="nom" value="<?= isset($parcour->nom) ? $parcour->nom : '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="code">Code </label>
            <input type="text" name="code" id="code" value="<?= isset($parcour->code) ? $parcour->code : '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="filiere_id">Filière </label>
            <select name="filiere_id" id="filiere_id" class="form-control" required>
                <?php foreach($filieres as $filiere ):
                        $selected = isset($filiere) && $parcour->filiere_id==$filiere->id ? 'selected' :'';
                ?>
                    <option value="<?= $filiere->id ?>" <?= $selected ?>> <?= $filiere->nom ?> </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" name="update_parcour" class="btn btn-primary">Mettre à jour</button>
        <a href="<?= $base_url ?>views/parcour" class="btn btn-danger">Annuler</a>
      <?php endforeach ?>
    </form>
    </div>
  </div>
</div>
