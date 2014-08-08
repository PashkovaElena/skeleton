<?php
/**
 * 
 * @author Pashkova Elena
 * @created 06-08-2014 3:31 PM
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

        if($this->getRequest()->isPost()){

            $params = $this->getRequest()->getParams();

            $messagesTable = Messages\Table::getInstance();
            $messagesTable->update( array('isRead' => (isset($params['isRead']) ? 1 : 0)),
                                    array('id'     =>  $params['id']));

            return;
        }

        return $crudController();
    };