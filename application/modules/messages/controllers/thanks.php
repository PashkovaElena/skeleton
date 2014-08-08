<?php
/**
 *
 * @author Pashkova Elena
 * @created 08-08-2014 6:48 PM
 *
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
