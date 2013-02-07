<?php use_helper('I18N') ?>

<h1><?php echo __('Signin', null, 'sf_guard') ?></h1>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>

<h1>
  Авторизация через социальные сети
</h1>
<script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="display=panel;fields=first_name,last_name;providers=facebook,vkontakte,google,mailru;hidden=other;redirect_uri=http%3A%2F%2Fjobeet.local%2Ffrontend_dev.php%2Fauthor%2Fauth"></div>