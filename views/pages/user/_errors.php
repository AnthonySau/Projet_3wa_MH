<?php if (!empty($data['errors'])) { ?>
<?php foreach ($data['errors'] as $error) { ?>
<p class="alert alert-danger"><?= $error ?></p>
<?php } ?>
<?php } ?>