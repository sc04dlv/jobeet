<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version7 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('blog_comment', 'blog_comment_author_id_sf_guard_user_id', array(
             'name' => 'blog_comment_author_id_sf_guard_user_id',
             'local' => 'author_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->createForeignKey('blog_comment', 'blog_comment_blog_post_id_blog_post_id', array(
             'name' => 'blog_comment_blog_post_id_blog_post_id',
             'local' => 'blog_post_id',
             'foreign' => 'id',
             'foreignTable' => 'blog_post',
             ));
        $this->createForeignKey('blog_post', 'blog_post_author_id_sf_guard_user_id', array(
             'name' => 'blog_post_author_id_sf_guard_user_id',
             'local' => 'author_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('blog_comment', 'blog_comment_author_id', array(
             'fields' => 
             array(
              0 => 'author_id',
             ),
             ));
        $this->addIndex('blog_comment', 'blog_comment_blog_post_id', array(
             'fields' => 
             array(
              0 => 'blog_post_id',
             ),
             ));
        $this->addIndex('blog_post', 'blog_post_author_id', array(
             'fields' => 
             array(
              0 => 'author_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('blog_comment', 'blog_comment_author_id_sf_guard_user_id');
        $this->dropForeignKey('blog_comment', 'blog_comment_blog_post_id_blog_post_id');
        $this->dropForeignKey('blog_post', 'blog_post_author_id_sf_guard_user_id');
        $this->removeIndex('blog_comment', 'blog_comment_author_id', array(
             'fields' => 
             array(
              0 => 'author_id',
             ),
             ));
        $this->removeIndex('blog_comment', 'blog_comment_blog_post_id', array(
             'fields' => 
             array(
              0 => 'blog_post_id',
             ),
             ));
        $this->removeIndex('blog_post', 'blog_post_author_id', array(
             'fields' => 
             array(
              0 => 'author_id',
             ),
             ));
    }
}