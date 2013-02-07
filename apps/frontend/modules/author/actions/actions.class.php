<?php

/**
 * author actions.
 *
 * @package    jobeet
 * @subpackage author
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeAuth(sfWebRequest $request)
  {
    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
    $user = json_decode($s, true);

//    print_r($user); die();

    if (!isSet($user['uid']) && !isSet($user['network'])) {
      die('token expired');
    }

    // check if user exists
    $author = Doctrine_Query::create()
            ->from('sfGuardUser u')
            ->where('u.identity = ?', $user['identity'])
            ->fetchOne()
    ;
//    print_r($author->toArray());
//    die('user check');

    if ($author) {
      // sf way
//      $this->getUser()->setAuthenticated(true);
      // guard way
      $this->getUser()->signIn($author);
      $this->redirect('@homepage');
    } else {
//      die('user not exists');
      // create new sf guard user
      $u = new sfGuardUser();
      $u->set('username',     $user['uid']);
      $u->set('first_name',   $user['first_name']);
      $u->set('last_name',    $user['last_name']);
      $u->set('email_address', $user['uid'].'@'.$user['network'].'.foo');
      $u->set('identity',     $user['identity']);
      $u->set('profile',      $user['profile']);
      $u->set('network',      $user['network']);
      $u->set('uid',          $user['uid']);
      $u->setPassword($user['uid']);
      $u->save();
      $this->getUser()->signIn($u);
      $this->redirect('@homepage');
    }


    //$user['network'] - соц. сеть, через которую авторизовался пользователь
    //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
    //$user['first_name'] - имя пользователя
    //$user['last_name'] - фамилия пользователя

  }
}
