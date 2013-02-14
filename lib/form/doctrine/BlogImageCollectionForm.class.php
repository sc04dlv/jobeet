<?php
//добавить валидатор

class BlogImageCollectionForm extends sfForm
{
  public function configure()
  {
//    print_r($this->getOption('blog_post'));
//    die();
    if (!$blog_post = $this->getOption('blog_post'))
    {
      throw new InvalidArgumentException('Error');
    }

    for ($i = 0; $i < $this->getOption('size', 2); $i++)
    {
      $blogImage = new BlogPostImage();
      $blogImage->BlogPost = $blog_post;
//      $blogImage->blog_post_id = $blog_post->id;

      $form = new BlogPostImageForm($blogImage);

      $this->embedForm($i, $form);
    }
    $this->mergePostValidator(new BlogPostImageValidatorSchema());
  }
}