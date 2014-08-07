<?php
/**
 * 
 * User: Pashkova Elena
 * Date: 06-08-2014 3:43 PM
 */

/**
 * @namespace
 */
namespace Application\Messages;

class Table extends \Bluz\Db\Table
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * Primary key(s)
     * @var array
     */
    protected $primary = array('id');

}