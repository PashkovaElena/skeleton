<?php
/**
 *
 * @author Pashkova Elena
 * @created 06-08-2014 3:43 PM
 */

/**
 * @namespace
 */
namespace Application\Messages;

use Bluz\Grid\Source\SqlSource;

/**
 * @category Application
 * @package  Messages
 */
class Grid extends \Bluz\Grid\Grid
{
    /**
     * @var string
     */
    protected $uid = 'messages';

    /**
     * init
     *
     * @return self
     */
    public function init()
    {
        // Setup source
        $adapter = new SqlSource();
        $adapter->setSource('SELECT * FROM messages');

        $this->setAdapter($adapter);
        $this->setDefaultLimit(25);
        $this->setAllowOrders(['userName', 'userEmail', 'created', 'id']);
        $this->setAllowFilters(['userName', 'userEmail', 'message', 'id']);
        return $this;
    }
}