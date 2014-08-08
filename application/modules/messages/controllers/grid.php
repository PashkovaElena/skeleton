<?php
/**
 * Grid of Contact Us
 *
 * @author Pashkova Elena
 * @created 07-08-2014 5:18 PM
 */

/**
 * @namespace
 */
namespace Application;

return
/**
 * @return \closure
 */
    function () use ($view, $module, $controller) {
        /**
         * @var Bootstrap $this
         * @var \Bluz\View\View $view
         */
        $this->getLayout()->setTemplate('dashboard.phtml');
        $this->getLayout()->breadCrumbs(
            [
                $view->ahref('Dashboard', ['dashboard', 'index']),
                __('Messages')
            ]
        );
        $grid = new Messages\Grid();
        $grid->setModule($module);
        $grid->setController($controller);

        $view->grid = $grid;
    };
