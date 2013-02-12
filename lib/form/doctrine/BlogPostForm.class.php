<?php

/**
 * BlogPost form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogPostForm extends BaseBlogPostForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['author_id']);

    for ($i = 1; $i <= 5; $i++)
    {
      $subForm = new BlogPostImageForm();

      $this->embedForm('pic-'.$i, $subForm);
    }




  }
}
