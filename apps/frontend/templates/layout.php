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
  <div class="container">

    <div id="header" class="row">
      <?php include_partial('global/common_header') ?>
    </div>

    <div id="body" class="row">
      <div class="span8">
        <?php echo $sf_content ?>
      </div>

      <div class="span4">

        <table class="table table-hover">
          <tr>
            <td>сыылка 1</td>
          </tr>
          <tr>
            <td>сыылка 2</td>
          </tr>
          <tr>
            <td>сыылка 3</td>
          </tr>
          <tr>
            <td>сыылка 4</td>
          </tr>
          <tr>
            <td>сыылка 5</td>
          </tr>
          <tr>
            <td>сыылка 6</td>
          </tr>
        </table>

      </div>

    </div>

  </div>
  <footer class="footer">
    <?php include_partial('global/footer') ?>
  </footer>


</body>
</html>
