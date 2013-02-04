<?php if ($sf_user->getFlash('error')): ?>
    <div class="alert alert-error">
      <?php echo $sf_user->getFlash('error') ?>
    </div>
  <?php elseif ($sf_user->getFlash('success')): ?>
    <div class="alert alert-success">
      <?php echo $sf_user->getFlash('success') ?>
    </div>
  <?php endif; ?>
