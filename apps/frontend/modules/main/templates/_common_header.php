<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="<?php echo url_for('@homepage') ?>">
      <?php $currentRouteName = $sf_context->getInstance()->getRouting()->getCurrentRouteName() ?>
      <?php echo $currentRouteName ?>
    </a>
    <ul class="nav">
      <li class="<?php echo ($currentRouteName == 'homepage' ? 'active' : '')?>"><a
          href="<?php echo url_for('@homepage') ?>">Home</a>
      </li>

      <li class="<?php echo ($currentRouteName == 'page-about-us' ? 'active' : '')?>"><a
          href="<?php echo url_for(array(
            'sf_route' => 'page-about-us',
            )) ?>">About us</a></li>

      <li class="<?php echo ($currentRouteName == 'page-show' && $sf_params->get('slug', null) == 'contacts' ? 'active' : '')?>"><a
          href="<?php echo url_for(array(
            'sf_route' => 'page-show',
            'slug' => 'contacts',
            )) ?>">Contacts</a></li>

      <li class="<?php echo ($currentRouteName == 'feedback' ? 'active' : '')?>"><a
          href="<?php echo url_for('@feedback') ?>">Feed Back</a></li>

    </ul>
<form class="navbar-form pull-right">
  <input type="text" class="span2">
  <button type="submit" class="btn">Submit</button>
</form>
   </div>
</div>