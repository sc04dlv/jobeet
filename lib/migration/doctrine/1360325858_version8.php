<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version8 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('blog_comment', 'root_id', 'integer', '8', array(
             ));
        $this->addColumn('blog_comment', 'lft', 'integer', '4', array(
             ));
        $this->addColumn('blog_comment', 'rgt', 'integer', '4', array(
             ));
        $this->addColumn('blog_comment', 'level', 'integer', '2', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('blog_comment', 'root_id');
        $this->removeColumn('blog_comment', 'lft');
        $this->removeColumn('blog_comment', 'rgt');
        $this->removeColumn('blog_comment', 'level');
    }
}