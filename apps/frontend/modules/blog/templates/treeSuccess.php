<h3>comments</h3>
<pre>
<?php foreach ($comments as $comment): ?>
  <a href="<?php echo url_for('@comment_add') ?>" /><?php echo str_repeat('--', $comment->getLevel()).$comment->getContent()."\n" ?>
<?php endforeach; ?>
</pre>