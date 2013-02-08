<?php

/**
 * post actions.
 *
 * @package    jobeet
 * @subpackage post
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
    $this->posts = BlogPostTable::getInstance()->findAll();
    $this->form = new BlogPostForm();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'post');
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
      $this->redirect('@blog_posts');
    } else {
      $this->getUser()->setFlash('error', 'Возникли ошибки!!!');
      $this->setTemplate('index');
    }
    $this->posts = BlogPostTable::getInstance()->findAll();
  }

  public function executeView(sfWebRequest $request)
  {
    $this->post = BlogPostTable::getInstance()->findOneBy('id', $request->getParameter('id', null));
    $this->form = new BlogCommentForm();
  }

  public function executeCommentCreate(sfWebRequest $request)
  {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'post');
    $this->form = new BlogCommentForm();
    $this->form->bind($request->getParameter('blog_comment'));
//    print_r($request->getParameter('blog_comment'));//die();
    if($this->form->isValid()) {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $this->form->getObject()->setAuthorId($user_id);

      $record = $this->form->save();
      $this->redirect('@blog_view?id='.$record->blog_post_id);
    } else {
//      die($request->getParameter('blog_comment')['blog_post_id']);
//      $form_vals = $this->form->getValues();
//      print_r($this->form->getObject()->toArray());
      $this->getUser()->setFlash('error', 'проверьте форму');
      $this->setTemplate('view');
    }
    $this->post = BlogPostTable::getInstance()->findOneBy('id', $request->getParameter('blog_comment')['blog_post_id']);
  }
}
