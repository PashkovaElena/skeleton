<?php
/**
 * @author Pashkova Elena
 * @created 08-08-2014 5:19 PM
 */
namespace Application;

use Application\Messages;
use Bluz\Controller;
use Recaptcha\Recaptchalib;
use Recaptcha\ReCaptchaResponse;

return
/**
 * @return \closure
 */
function () use ($bootstrap, $view) {
    /**
     * @var Bootstrap $this
     */

    $request = $this->getRequest();

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if($request->isPost())
    {
        $params = $request->getAllParams();

        $recaptcha = new Recaptchalib();
        $resp = $recaptcha->recaptcha_check_answer (
            '6Lf6X_gSAAAAAAIAXLKN05B6zC6elZZS247jEYuI',
            $ip,
            $params['recaptcha_challenge_field'],
            $params['recaptcha_response_field']);

        // if CAPTCHA is correctly entered
        if ($resp->is_valid) {
            echo 'great success!';
        } else {
            echo 'CAPTCHA entries are incorrect';
            //$view->message = 'Invalid captcha';
            //$this->redirectTo('messages', 'index');
        }
        die;
    }

    $crudController = new Controller\Crud();
    $crudController->setCrud(Messages\Crud::getInstance());

    return $crudController();
};
