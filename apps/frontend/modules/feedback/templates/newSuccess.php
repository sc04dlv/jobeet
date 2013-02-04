<h1>Обратная связь</h1>

<?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('can-feedback')): ?>

  <?php include_partial('user/flash', array('sf_user' => $sf_user)) ?>

  <form method="post" action="<?php echo url_for('@feedback_create') ?>">
    <?php echo $form ?>
    <input type="submit" value="ok">
  </form>


<?php else: ?>

You must
<a href="<?php echo url_for('@user_auto_auth') ?>">auth</a> or
<a href="">register </a>
before.
<?php endif; ?>
