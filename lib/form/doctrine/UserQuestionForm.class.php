<?php

/**
 * Question form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserQuestionForm extends QuestionForm
{
  public function configure()
  {
    parent::configure();
    unset($this['answer']);

    $this->setWidget('captcha', new sfWidgetCaptchaGD());
    $this->setValidator('captcha', new sfCaptchaGDValidator(array('length' => 4)));
  }
}
