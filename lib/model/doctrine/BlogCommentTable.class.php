<?php

/**
 * BlogCommentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BlogCommentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BlogCommentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BlogComment');
    }
}