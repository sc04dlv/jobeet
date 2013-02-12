<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version11 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('blog_post_image', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '4',
             ),
             'blog_post_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '4',
             ),
             'content' => 
             array(
              'type' => 'blob',
              'notnull' => '1',
              'length' => '',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('blog_post_image');
    }
}