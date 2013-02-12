<?php

require_once dirname(__FILE__).'/../lib/blog_commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/blog_commentGeneratorHelper.class.php';

/**
 * blog_comment actions.
 *
 * @package    jobeet
 * @subpackage blog_comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blog_commentActions extends autoBlog_commentActions
{
  protected function addSortQuery($query){
    $query->addOrderBy('root_id asc, lft asc');
  }
}
