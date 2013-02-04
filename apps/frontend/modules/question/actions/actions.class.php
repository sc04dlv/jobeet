<?php

/**
 * question actions.
 *
 * @package    jobeet
 * @subpackage question
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->questions = QuestionTable::getInstance()->findAll();
    $this->form = new UserQuestionForm();
    $this->forward404Unless($this->questions);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'question');
    $this->form = new UserQuestionForm();
//    $this->form->getObject() == new Question();
//    $this->form->getObject()->setQuestion($request->getParameter('question')['question']);
//    $this->form->getObject()->setId($request->getParameter('question')['id']);

    $this->form->bind($request->getParameter('question', null));

    if ($this->form->isValid()) {
      // save
      $record = $this->form->save();
      $this->redirect('@question_success');
    } else {
      $this->forward('question', 'index');
      // DO nothing, warn user and show form
    }
  }

  public function executeSuccess(sfWebRequest $request)
  {
    $this->page = Doctrine::getTable('Page')->findOneBySlug('question') ;// get from db;
  }
}
