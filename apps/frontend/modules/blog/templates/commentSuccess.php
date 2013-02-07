
       <?php if (count($blog->getPostComments())):?>
          <?php foreach ($blog->getPostComments() as $comment): ?>
              <p><?php echo $comment->getContent() ?>
              <p><i><?php echo $comment->getAuthor()->getUsername() ?></i>
          <?php endforeach; ?>
        <?php endif; ?>

