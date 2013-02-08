<h1><?php echo $post->title; ?> </h1>

<?php echo $post->getContent(); ?>
<hr />
<h3>comments</h3>
  <?php if (count($post->getPostComments())):?>
  <table class="table table-striped"><tbody>
  <?php foreach ($post->getPostComments() as $comment): ?>
    <tr><td>
      <p><?php echo htmlspecialchars($comment->getContent());?>
      <p><i><?php echo $comment->getAuthor()->getName() ?></i>
      </td></tr>
  <?php endforeach; ?>
  </tbody></table>
<?php endif; ?>

<hr />
<?php if ($sf_user->isAuthenticated()):?>
<h3>add comment</h3>
<form method="post" action="<?php echo url_for('@blog_comment_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="add" />
</form>
<?php else: ?>
  <?php include_partial('global/auth_or_register'); ?>
<?php endif; ?>