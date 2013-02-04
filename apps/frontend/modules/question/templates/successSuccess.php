<h1>
  Вопрос добавлен
</h1>

<?php echo ($page ? $page->getContent() : '') ?>

 <a href="<?php echo url_for('@question') ?>">к списку вопросов</a>
 ::
 <a href="<?php echo url_for('@homepage') ?>">на главную</a>