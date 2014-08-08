<?php
/**
 * @author Pashkova Elena
 * @created 08-08-2014 5:19 PM
 */
namespace Application;

use Application\Messages;
use Bluz\Controller;

return
/**
 * @return \closure
 */
function () {
    /**
     * @var Bootstrap $this
     */
    $crudController = new Controller\Crud();
    $crudController->setCrud(Messages\Crud::getInstance());

    return $crudController();
};
