<?php

/**
 * BlogComment form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogCommentForm extends BaseBlogCommentForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['author_id'], $this['lft'], $this['rgt'], $this['level'], $this['root_id']);
    $this->setWidget('blog_post_id', new sfWidgetFormInputHidden());

    $request = sfContext::getInstance()->getRequest();
    $this->setDefault('blog_post_id', $request->getParameter('id', 0));

//    $this->setWidget('parent', new sfWidgetFormDoctrineChoiceNestedSet(array(
//        'model'     =>  'BlogComment',
//        'add_empty' =>  true
//    )));
    $this->setWidget('parent', new sfWidgetFormInputHidden());
    $this->setValidator('parent', new sfValidatorPass());

//    если текущая конструкция имеет родителя, выбрать его по умолчанию
//    if($this->getObject()->getNode()->hasParent()){
//      $this->setDefault('parent', $this->getObject()->getNode()->getParent()->getId());
//    }
    $this->useFields(array(
      'content',
      'parent'
    ));
    $this->widgetSchema->setLabels(array(
      'name'    =>  'content',
      'parent'  =>  'parent category'
    ));

//    Установить валидатор для нового виджета для предотвращения перемещения категории в один из своих потомков
    $this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'BlogComment',
      'node'     => $this->getObject()
    )));

  }
}