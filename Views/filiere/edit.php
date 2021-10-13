<?php
    require_once('../../Controllers/filiere.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modification filière</h2>
    </div>
    <div class="card-body">
        <?php if(!empty($message)): ?>
          <?= $message; ?>
        <?php endif; ?>
    <form action="" method="post">
        <?php foreach ($filieres as $filiere): ?>
            <input type="hidden" name="filiere_id" value="<?= isset($filiere->id) ? $parcour->id : '' ?>">
            <div class="form-group">
                <label for="nom">Nom </label>
                <input type="text" name="nom" id="nom" value="<?= isset($filiere->nom) ? $filiere->nom : '' ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="code">Code </label>
                <input type="text" name="code" id="code" value="<?= isset($filiere->code) ? $filiere->code : '' ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Type </label>
                <select name="type_id" id="type" class="form-control" required>
                  <!-- <option value="0" selected>--</option> -->
                  <?php foreach($typeFilieres as $type ):
                        $selected = isset($type) && $filiere->type_id==$type->id ? 'selected' :'';
                    ?>
                    <option value="<?= $type->id ?>" <?= $selected ?>> <?= $type->nom ?> </option>
                  <?php endforeach ?>
                </select>
            </div>
            <button type="submit" name="update_filiere" class="btn btn-primary">Mettre à jour</button>
            <a href="<?= $base_url ?>/Views/filiere" class="btn btn-danger">Annuler</a>
        <?php endforeach ?>
    </form>
    </div>
  </div>
</div>
