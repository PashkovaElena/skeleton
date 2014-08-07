<?php
/**
 * 
 * User: Pashkova Elena
 * Date: 06-08-2014 3:31 PM
 */
namespace Application;

use Application\Messages;
use Bluz\Controller;

return
    /**
     * @privilege Management
     * @return mixed
     */
    function () {
        /**
         * @var Bootstrap $this
         */
        $crudController = new Controller\Crud();
        $crudController->setCrud(Messages\Crud::getInstance());
        return $crudController();
    };