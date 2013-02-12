<h1><?php echo $post->title ?> </h1>

<?php echo $post->getContent(); ?>
<hr />
Галерея
<hr />
<?php foreach ($post->getPostImages() as $image): ?>
  <img src="/uploads/<?php echo $image->getFilename(); ?>" height="200" width="200" />
<?php endforeach; ?>
<h3>comments</h3>
<?php if (count($post->getPostComments())):?>
  <table class="table table-striped"><tbody>
  <?php foreach ($post->getPostComments() as $comment): ?>
    <tr>
      <td style="padding-left: <?php echo 40*$comment->getLevel() ?>px;">
        <a href="#<?php echo $comment->getId() ?>"><?php echo $comment->getId() ?></a>

        <p><?php echo htmlspecialchars($comment->getContent());?>
        <p><i><?php echo $comment->getAuthor()->getName() ?></i>
        <div id="comment-<?php echo $comment->getId() ?>">
          <a class="commentMe" rel="<?php echo $comment->getId() ?>" href="javascript: void(0)">comment me</a>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody></table>
<?php endif; ?>

<script>
  $('.commentMe').click(function() {
    $('#blog_comment_parent').attr('value', $(this).attr('rel'));
    var form = $('#commentForm').html()
    $(this).parent().html(form).css("background", "yellow");
    $('#commentFormWrapper').html('---');
//    $(this).parent().css("background", "yellow");
  });
</script>
<hr />
<?php if ($sf_user->isAuthenticated()):?>
  <div id="commentFormWrapper">
    <div id="commentForm">
      <h3>add comment</h3>
      <form method="post" action="<?php echo url_for('@blog_comment_create') ?>">
        <?php echo $form ?>
        <input type="submit" value="add" />
      </form>
    </div>
  </div>
<?php else: ?>
  <?php include_partial('global/auth_or_register'); ?>
<?php endif; ?>