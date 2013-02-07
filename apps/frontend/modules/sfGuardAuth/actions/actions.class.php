<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/../lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeAuth(sfWebRequest $request)
  {
    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
    $user = json_decode($s, true);

//    print_r($user); authdie();

    if (!isSet($user['uid']) && !isSet($user['network'])) {
      die('token expirauthed');
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
