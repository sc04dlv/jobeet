<?php

/**
 * search actions.
 *
 * @package    jobeet
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'search');
    $this->search = Doctrine_Query::create()
            ->from('blog_post bp')
            ->where('bp.content LIKE ?', '%'.$request->getParameter('search', null).'%')
            ->fetchArray()
    ;
  }
}
