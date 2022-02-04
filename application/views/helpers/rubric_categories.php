<option value="">Rubric/ Category</option>
<?php foreach($rubric_categories as $cat): ?>
<option value="<?= $cat['id'] ?>" <?= (isset($rubric_cat_id) && $rubric_cat_id == $cat['id'] ) ? 'selected' : ''; ?>><?= $cat['name'] ?></option>
<?php endforeach; ?>