<?php
/**
 *
 * User: Pashkova Elena
 * Date: 8/6/14 1:13 PM
 */
namespace Application;

use Bluz;

return
    /**
     * @return \closure
     */
    function () use ($bootstrap, $view) {
        /**
         * @var Bootstrap $this
         * @var \closure $bootstrap
         * @var Bluz\View\View $view
         */
        $view->title('Contact Us');
        $this->getLayout()->breadCrumbs(['Contact Us']);
    };
