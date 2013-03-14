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

    $this->embedRelation('PostImages');

    $form = new BlogImageCollectionForm(null, array(
      'blog_post' => $this->getObject(),
      'size'      => 2,
    ));

    $this->embedForm('newPhotos', $form);
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $forms)
    {
      $images = $this->getValue('newPhotos');

      $forms = $this->embeddedForms;
      foreach ($this->embeddedForms['newPhotos'] as $index => $form)
      {
        if (!isset($images[$index]))
        {
          unset($forms['newPhotos'][$index]);
        }
      }
    }
    return parent::saveEmbeddedForms($con, $forms);
  }
}
