<?php
    require_once('../../controllers/Filiere.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Création filière</h2>
    </div>
    <div class="card-body">
        <?php if(!empty($message)): ?>
          <?= $message; ?>
        <?php endif; ?>
    <form action="" method="post">
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
              <option value="0" selected>--</option>
              <?php foreach($typeFilieres as $key => $value ): ?>
                <option value="<?= $value->id ?>"><?= $value->nom ?></option>
              <?php endforeach ?>
            </select>
        </div>
        <button type="submit" name="submit_filiere" class="btn btn-primary">Enregistrer</button>
        <a href="<?= $base_url ?>views/filiere" class="btn btn-danger">Annuler</a>
    </form>
    </div>
  </div>
</div>
