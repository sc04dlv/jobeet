<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class RegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    $this->setWidget('captcha', new sfWidgetCaptchaGD());
    $this->setValidator('captcha', new sfCaptchaGDValidator(array('length' => 4)));

    $this->setValidator('email_address', new sfValidatorEmail(array(), array()));
  }
}