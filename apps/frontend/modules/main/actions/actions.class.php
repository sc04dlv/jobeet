<?php

/**
 * main actions.
 *
 * @package    jobeet
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeHome(sfWebRequest $request)
  {
    $this->page = Doctrine::getTable('Page')->findOneBySlug('welcome') ;// get from db;
    $this->forward404Unless($this->page);
//    $this->page = Doctrine::getTable('Page')->findOneBy('slug', 'welcome') ;// get from db;
    
  }
}
