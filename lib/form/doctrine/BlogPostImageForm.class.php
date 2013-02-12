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
    unset($this['created_at'], $this['updated_at'], $this['blog_post_id']);

    $this->setWidget('filename', new sfWidgetFormInputFile());
    $this->setValidator('filename', new sfValidatorFile(
            array(
                'path'              => sfConfig::get('sf_upload_dir'),
                'max_size'          => 1024000,
                'mime_categories'   => 'web_images',
            ),
            array()
    ));

    $this->widgetSchema->setFormFormatterName('list');
  }
}
