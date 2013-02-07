<h1>Blog post list</h1>


<table>
  <tbody>
    <tr>
    </tr>
    <tr>
      <?php foreach ($blogs as $blog): ?>
  <h3><a href="<?php echo url_for('@blog_comment') ?>"> <?php echo $blog->getTitle() ?></a></h3>
        <p><?php echo $blog->getContent(ESC_RAW) ?></p>
        <small><?php echo $blog->getAuthor()->__toString() ?>
          <i><?php echo $blog->getCreatedAt() ?></i>
        </small>
        <hr />
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<h2>Create new post</h2>
<form method="post" action="<?php echo url_for('@blogpost_create') ?>">
      <?php echo $form ?>
      <input type="submit" value="ok" />
</form>