<?php

/**
 * post actions.
 *
 * @package    jobeet
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blogActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->posts = BlogPostTable::getInstance()->findAll();
    $this->form = new BlogPostForm();
    $this->form_image = new BlogPostImageForm();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'post');

    $this->form = new BlogPostForm();

    $this->form->bind($request->getParameter('blog_post'), $request->getFiles('blog_post'));
//print_r($request->getParameter('blog_post_image'));die();

    if($this->form->isValid() && $this->form_image->isValid()){
      // bind active user
      $user_id = $this->getUser()->getGuardUser()->getId();
      $this->form->getObject()->setAuthorId($user_id);

      $record = $this->form->save();
      $this->redirect('@blog_posts');
    } else {
      $this->getUser()->setFlash('error', 'Возникли ошибки!!!');
      $this->setTemplate('index');
    }
    $this->posts = BlogPostTable::getInstance()->findAll();
  }

  public function executeView(sfWebRequest $request)
  {
    $this->post = Doctrine_Query::create()
            ->from('BlogPost p')
            ->leftJoin('p.PostComments pc')
            ->leftJoin('p.PostImages pi')
            ->where('p.id = ?', $request->getParameter('id', null))
            ->orderBy('pc.root_id asc, pc.lft asc')
            ->fetchOne()
    ;
    $this->forward404Unless($this->post);
    $this->form = new BlogCommentForm();
  }

  public function executeCommentCreate(sfWebRequest $request)
  {
    $this->redirectUnless($request->isMethod(sfRequest::POST), 'post');
    $this->form = new BlogCommentForm();
    $this->form->bind($request->getParameter('blog_comment'));
//    print_r($request->getParameter('blog_comment'));//die();
    if($this->form->isValid()) {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $this->form->getObject()->setAuthorId($user_id);

      $record = $this->form->save();

      // check if create root
      if (empty($request->getParameter('blog_comment')['parent'])) {
        $treeObject = Doctrine_Core::getTable('BlogComment')->getTree();
        $treeObject->createRoot($record);
      } else {
        // get parent
        $parent = Doctrine_Core::getTable('BlogComment')
                ->findOneBy('id', $request->getParameter('blog_comment')['parent']);
        // set as last child
        $record->getNode()->insertAsLastChildOf($parent);
      }

      $this->redirect('@blog_view?id='.$record->blog_post_id);
    } else {
      $this->getUser()->setFlash('error', 'проверьте форму');
      $this->setTemplate('view');
    }
    $this->post = BlogPostTable::getInstance()->findOneBy('id', $request->getParameter('blog_comment')['root_id']);
  }

  public function executeTree(sfWebRequest $request) {
//    $parent_id = 1;
//    $tmp = Doctine::getTable('BlogComment')->findOneBy('id', $parent_id);
//    $this->comment = new BlogComment();
//    $this->comment->content = 'root_comment';
//    $this->comment->blog_post_id = 6;
//    $this->comment->author_id = 14;
//    $this->comment->save();
//    $this->comment->getNode()->insertAsLastChildOf($tmp);

//    for($i=0; $i<10; $i++){
//      $this->comment = new BlogComment();
//      $this->comment->content = 'comment #'.$i;
//      $this->comment->blog_post_id = 6;
//      $this->comment->author_id = 14;
//      $this->comment->save();
//
//      $commentTable = Doctrine_Core::getTable('BlogComment');
//      $treeObject = $commentTable->getTree();
//      $treeObject->createRoot($this->comment);
//    }
//    $this->redirect('@homepage');
//  }
//}

    $this->comment = new BlogComment();
    $this->comment->content = 'root_comment';
    $this->comment->blog_post_id = 6;
    $this->comment->author_id = 14;
    $this->comment->save();


//    print_r($this->comment->toArray());

    $commentTable = Doctrine_Core::getTable('BlogComment');
    $treeObject    = $commentTable->getTree();
    $treeObject->createRoot($this->comment);

//    print_r($this->comment->toArray());

//    die('error');

//    $treeObject = Doctrine_Core::getTable('BlogComment')->getTree();
//    $treeObject->createRoot($this->comment);

//    $p = new BlogPost;  // actas: Tagable: ~
//    $p->setTags(array('foo', 'bar'));
    $this->comment_1_1 = new BlogComment();
    $this->comment_1_1->content = 'comment_1_1';
    $this->comment_1_1->blog_post_id = 6;
    $this->comment_1_1->author_id = 14;
    $this->comment_1_1->getNode()->insertAsLastChildOf($this->comment);
    $this->comment_1_1->save();
    $this->comment->refresh();

    $this->comment_1_2 = new BlogComment();
    $this->comment_1_2->content = 'comment_1_2';
    $this->comment_1_2->blog_post_id = 6;
    $this->comment_1_2->author_id = 14;
    $this->comment_1_2->getNode()->insertAsLastChildOf($this->comment);
    $this->comment->refresh();

    $this->comment_1_1_1 = new BlogComment();
    $this->comment_1_1_1->content = 'comment_1_1_1';
    $this->comment_1_1_1->blog_post_id = 6;
    $this->comment_1_1_1->author_id = 14;
    $this->comment_1_1_1->getNode()->insertAsLastChildOf($this->comment_1_1);
    $this->comment->refresh();
    $this->comments = Doctrine_Query::create()
           ->from('BlogComment c')
           ->orderBy('c.blog_post_id, c.lft')
           ->execute()
    ;
  }
}
