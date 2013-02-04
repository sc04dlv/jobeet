<h1>Обратная связь</h1>
<?php if ($sf_user->getFlash('error')): ?>
  <div class="alert-error">
    <?php echo $sf_user->getFlash('error') ?>
  </div>
<?php endif; ?>
<form method="post" action="<?php echo url_for('@feedback_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="ok">
</form>