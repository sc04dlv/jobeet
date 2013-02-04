<?php

/**
 * feedback actions.
 *
 * @package    jobeet
 * @subpackage feedback
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {
    $this->forwardUnless($request->isMethod(sfRequest::GET), 'feedback', 'new');
    $this->form = new FeedBackForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'feedback/new');
    $this->form = new FeedBackForm();
    $this->form->bind($request->getParameter('feed_back', null));

    if ($this->form->isValid()) {
      // save
      $record = $this->form->save();
      $this->redirect('@feedback_success');
    } else {
      $this->getUser()->setFlash('error', 'Возникли ошибки!!!');
      $this->setTemplate('new');
      // DO nothing, warn user and show form
    }
  }

  public function executeSuccess(sfWebRequest $request)
  {
    $this->page = Doctrine::getTable('Page')->findOneBySlug('feedback') ;// get from db;
    $this->forward404Unless($this->page);
  }
}