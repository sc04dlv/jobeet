<?php

/**
 * page actions.
 *
 * @package    jobeet
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->page = Doctrine::getTable('Page')->findOneBy('slug', $request->getParameter('slug', null));
    $this->forward404Unless($this->page);
  }

  public function executeFeedback(sfWebRequest $request)
  {
    $this->page = Doctrine::getTable('Page')->findOneBySlug('feedback') ;// get from db;
    $this->forward404Unless($this->page);
  }
}
