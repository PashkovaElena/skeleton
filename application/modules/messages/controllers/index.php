<?php
/**
 *
 * @author Pashkova Elena
 * @created 8/6/14 1:13 PM
 */
namespace Application;

use Bluz;
use Recaptcha\Recaptchalib;
use Recaptcha\ReCaptchaResponse;

return
/**
 * @return \closure
 */
    function ($messages = false) use ($bootstrap, $view) {
        /**
         * @var Bootstrap $this
         * @var \closure $bootstrap
         * @var Bluz\View\View $view
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
            $recaptcha = new Recaptchalib();
            $resp = $recaptcha->recaptcha_check_answer ('6Lf6X_gSAAAAAAIAXLKN05B6zC6elZZS247jEYuI',
                $ip,
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]);


            // if CAPTCHA is correctly entered!
            if ($resp->is_valid) {
                //$this->getMessages()->addSuccess('Success!');
            } else {
                //$this->getMessages()->addError('Captcha error');
            }

        }


        $view->title('Contact Us');
        $this->getLayout()->breadCrumbs(['Contact Us']);

        $recaptcha = new Recaptchalib();
        $view->recaptcha = $recaptcha->recaptcha_get_html("6Lf6X_gSAAAAAA-vhyxB4FnHxFFFrKxk_CEBZG8H");


        $view->ip = $ip;
        $view->privatekey = '6Lf6X_gSAAAAAAIAXLKN05B6zC6elZZS247jEYuI';
    };
