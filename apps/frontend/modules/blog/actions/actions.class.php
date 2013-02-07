<?php

/**
 * blog actions.
 *
 * @package    jobeet
 * @subpackage blog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blogActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->blogs = BlogPostTable::getInstance()->findAll();
    $this->form = new BlogPostForm();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'blog');
    $this->form = new BlogPostForm();
    $this->form->bind($request->getParameter('blog_post'));

    if($this->form->isValid()){
      // bind active user
      $user_id = $this->getUser()->getGuardUser()->getId();
//      die($user_id);
      $this->form->getObject()->setAuthorId($user_id);
//      $rec = $this->form->getObject();//->link('Author', $this->getUser()->getGuardUser());
//      $rec->link('Author', $user_id);// $this->getUser()->getGuardUser());
//      print_r($rec->toArray());
//      die();
      $record = $this->form->save();
      $this->redirect('@blog');
    } else {
      $this->getUser()->setFlash('error', 'Возникли ошибки!!!');
      $this->setTemplate('index');
    }
    $this->blogs = BlogPostTable::getInstance()->findAll();

  }
}
