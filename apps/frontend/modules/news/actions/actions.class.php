<?php

/**
 * list_feedback actions.
 *
 * @package    jobeet
 * @subpackage list_feedback
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->newsCollection = NewsTable::getInstance()->findAll();
  }

  public function executeView(sfWebRequest $request)
  {
//    print_r($request->getParameter('id', 0)); die();
    $this->news = NewsTable::getInstance()->findOneBy('id', $request->getParameter('id', 0));
    $this->forward404Unless($this->news);
  }
}
