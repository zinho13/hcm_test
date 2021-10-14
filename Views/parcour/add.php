<?php
    require_once('../../controllers/Parcour.php');
    include('../header.php');
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Création parcour</h2>
    </div>
    <div class="card-body">
      	<?php if(!empty($message)): ?>
          <?= $message; ?>
      	<?php endif; ?>
		<form action="" method="post">
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
		        		<option value="0" selected>--</option>
                <?php foreach($filieres as $filiere ):
                        $selected = isset($filiere) && $filiere->type_id==$filiere->id ? 'selected' :'';
                ?>
                    <option value="<?= $filiere->id ?>"> <?= $filiere->nom ?> </option>
                <?php endforeach ?>
            </select>
         </div>
		    <button type="submit" name="submit_parcour" class="btn btn-primary">Enregistrer</button>
		    <a href="<?= $base_url ?>views/parcour" class="btn btn-danger">Annuler</a>
		</form>
    </div>
  </div>
</div>
