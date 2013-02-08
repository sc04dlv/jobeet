<h1>Blog post list</h1>

<table>
  <tbody>
    <tr>
    </tr>
    <tr>
      <?php foreach ($posts as $post): ?>
      <h3><a href="<?php echo url_for(array(
          'sf_route'    => 'blog_view',
          'id'          => $post->id
      )) ?>"> <?php echo $post->getTitle() ?></a></h3>
      <p><?php echo $post->getContent(ESC_RAW) ?></p>
      <small><?php echo $post->getAuthor()->__toString() ?>
        <i><?php echo $post->getCreatedAt() ?></i>
      </small>
      <hr />
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<?php if ($sf_user->isAuthenticated()):?>
<h2>Create new post</h2>
<form method="post" action="<?php echo url_for('@blogpost_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="ok" />
</form>
<?php else: ?>
  <?php include_partial('global/auth_or_register');?>
<?php endif; ?>