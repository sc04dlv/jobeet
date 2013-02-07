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
    $this->questions = Doctrine_Query::create()
            ->from('Question q')
            ->fetchArray()
    ;
    $this->setLayout(FALSE);
    sfConfig::set('sf_web_debug', FALSE);
    return $this->renderText(json_encode($this->questions));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless(sfRequest::POST);

    $this->form = new QuestionForm();
    $this->form->bind($request->getParameter('question', null));

//    SELECT `token`
//      FROM `Partners`
//      WHERE `url` == $request->getReferer()

    if ($this->form->isValid()) {
      $this->form->save();
      $this->redirect($request->getReferer());
    }
    else
    {
      die($this->form->renderGlobalErrors());
      $this->redirect($request->getReferer());
    }
  }
}
