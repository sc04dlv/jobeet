<?php

/**
 * list_feedback actions.
 *
 * @package    jobeet
 * @subpackage list_feedback
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class list_feedbackActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeOutput(sfWebRequest $request)
  {
//    $this->feed_backs = Doctrine::getTable('FeedBack')->findAll();
    $this->feed_backs = FeedBackTable::getInstance()->findAll();
  }
}
