<div class="navbar">
  <div class="navbar-inner">
<!--    <a class="brand" href="<?php // echo url_for('@homepage') ?>">
      <?php // $currentRouteName = $sf_context->getInstance()->getRouting()->getCurrentRouteName() ?>
      <?php // echo $currentRouteName ?>
    </a>-->
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

      <li class="<?php echo (strstr($currentRouteName, 'feedback') ? 'active' : '')?>"><a
          href="<?php echo url_for('@feedback_new') ?>">Feed Back</a></li>

      <li class="<?php echo (strstr($currentRouteName, 'news') ? 'active' : '')?>"><a
          href="<?php echo url_for('@news') ?>">News</a></li>

      <li class="<?php echo (strstr($currentRouteName, 'question') ? 'active' : '')?>"><a
          href="<?php echo url_for('@question') ?>">Question</a></li>

      <li class="<?php echo (strstr($currentRouteName, 'blog') ? 'active' : '')?>"><a
          href="<?php echo url_for('@blog_posts') ?>">Blog</a></li>

      <li>
        <?php if (!$sf_user->isAuthenticated()): ?>
          <?php echo link_to('auth', '@sf_guard_signin') ?>
        <?php else: ?>
          <?php echo link_to('logoff', '@sf_guard_signout') ?>
        <?php endif; // (!$sf_user->isAuthenticated()): ?>
      </li>


    </ul>
    <form class="navbar-form pull-right" action="<?php echo url_for('@search') ?>">
      <input type="text" class="span2">
      <button type="submit" class="btn">Search</button>
    </form>
  </div>
</div>