<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version9 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('blog_comment', 'root_id');
    }

    public function down()
    {
        $this->addColumn('blog_comment', 'root_id', 'integer', '8', array(
             ));
    }
}