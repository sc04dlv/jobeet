<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('news', 'is_enabled');
    }

    public function down()
    {
        $this->addColumn('news', 'is_enabled', 'boolean', '25', array(
             ));
    }
}