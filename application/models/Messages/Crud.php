<?php
/**
 * Class Crud of Messages
 *
 * @package  Application\Messages
 *
 * @author Pashkova Elena
 * @created 06-08-2014 3:43 PM
 */

/**
 * @namespace
 */
namespace Application\Messages;


class Crud extends \Bluz\Crud\Table
{
    public function createOne($data)
    {
        app()->redirectTo('messages', 'thanks');
    }
}
