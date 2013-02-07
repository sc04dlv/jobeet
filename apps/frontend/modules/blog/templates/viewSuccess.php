<h1><?php echo $post->title; ?> </h1>

<?php echo $post->getContent(); ?>
<hr />
<h3>comments</h3>
  <?php if (count($post->getPostComments())):?>
  <?php foreach ($post->getPostComments() as $comment): ?>
      <p><?php echo $comment->getContent() ?>
      <p><i><?php echo $comment->getAuthor()->getName() ?></i>
  <?php endforeach; ?>
<?php endif; ?>

<h3>add comment</h3>
<form method="post" action="<?php echo url_for('@blog_comment_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="add" />
</form>