<?php

/**
 * BlogPostImage form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogPostImageForm extends BaseBlogPostImageForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);


    $this->setWidget('blog_post_id', new sfWidgetFormInputHidden());

    $this->setWidget('filename', new sfWidgetFormInputFileEditable(
            array(
                'file_src'  => $this->getObject()->isNew() ? '---' : '<a target="_blank" href="/uploads/'.$this->getObject()->getFilename().'">view pic</a>',
            )
    ));

    $this->setValidator('filename', new sfValidatorFile(
            array(
                'path'              => sfConfig::get('sf_upload_dir'),
                'max_size'          => 1024000,
                'mime_categories'   => 'web_images',
                'required' => false,
            ),
            array()
    ));

    $this->widgetSchema->setFormFormatterName('list');
  }
}