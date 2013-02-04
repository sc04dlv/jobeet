<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div style="border: 1px solid gray; padding: 10px 20px; margin-bottom: 20px;">
      Adminko &asymp;
      <?php echo link_to('Pages', '@page') ?> ::
      <?php echo link_to('Feedbacks', '@feedback') ?> ::
      <?php echo link_to('News', '@news') ?> ::
      <?php echo link_to('Question', '@question') ?>
    </div>
    <?php echo $sf_content ?>
  </body>
</html>
