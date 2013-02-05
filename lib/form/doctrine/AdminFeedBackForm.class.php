<?php

/**
 * FeedBack form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeedBackForm extends BaseFeedBackForm
{
  public function configure()
  {
    // 1.
//    $this->setWidgets(array(
//      'id'         => new sfWidgetFormInputHidden(),
//      'email'      => new sf
//      'id'         => new sfWidgetFormInputHidden(),
//      'email'      => new sfWidgetFormInputText(),
//      'phone'      => new sfWidgetFormInputText(),
//      'content'    => new sfWidgetFormInputText(),
//      'captcha'    =>  new sfWidgetCaptchaGD()
//    ));
//
//    $this->setValidators(array(
//      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
//      'email'      => new sfValidatorString(array('max_length' => 255)),
//      'phone'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
//      'content'    => new sfValidatorString(array('max_length' => 255)),
//      'captcha'    => new sfCaptchaGDValidator(array('length' => 4))
//    ));WidgetFormInputText(),
//      'phone'      => new sfWidgetFormInputText(),
//      'content'    => new sfWidgetFormInputText(),
//      'captcha'    =>  new sfWidgetCaptchaGD()
//    ));
//
//    $this->setValidators(array(
//      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
//      'email'      => new sfValidatorString(array('max_length' => 255)),
//      'phone'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
//      'content'    => new sfValidatorString(array('max_length' => 255)),
//      'captcha'    => new sfCaptchaGDValidator(array('length' => 4))
//    ));

    // 2.
    unset($this['created_at'], $this['updated_at']);

    $this->setWidget('captcha', new sfWidgetCaptchaGD());
    $this->setValidator('captcha', new sfCaptchaGDValidator(array('length' => 4)));
  }
}
