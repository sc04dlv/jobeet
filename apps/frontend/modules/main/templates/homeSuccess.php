<h1>
  Welcome
</h1>

<?php if ($page): ?>
  <h2><?php echo $page->getName() ?></h2>

  <?php echo $page->getContent() ?>
<?php endif; ?>
