<?php

/**
 * user actions.
 *
 * @package    jobeet
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 /**
  * Executes auto auth
  *
  * @param sfRequest $request A request object
  */
  public function executeAutoAuth(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(TRUE);
    $this->getUser()->addCredentials(array('can-feedback', 'can-question', 'can-logoff'));
    $this->getUser()->setFlash('success', 'Вы успешно авторизованы!');
    $this->redirect($request->getReferer());
//    $this->redirect('@homepage');
  }

  public function executeLogoff(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(FALSE);
    $this->redirect('@homepage');
  }
}
