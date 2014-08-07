<?php
/**
 * 
 * User: Pashkova Elena
 * Date: 06-08-2014 3:43 PM
 */

/**
 * @namespace
 */
namespace Application\Messages;

use Application\Users;
use Bluz\Validator\Traits\Validator;
use Bluz\Validator\Validator as v;

/**
 * Messages Row
 *
 * @property integer $id
 * @property integer $userId
 * @property string $userName
 * @property string $userEmail
 * @property string $message
 * @property string $created
 * @property boolean $isRead
 * @property boolean $isAnswered
 *
 * @category Application
 * @package  Application\Messages
 */
class Row extends \Bluz\Db\Row
{
    use Validator;

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function beforeSave()
    {
        $this->email = strtolower($this->email);

        // name validator
        $this->addValidator(
            'userName',
            v::required()
        );

        // email validator
        $this->addValidator(
            'userEmail',
            v::required()
                ->email(true)
                ->setError('Not valid email')
        );

        // message validator
        $this->addValidator(
            'message',
            v::required(),
            v::callback(function ($input){echo $input;die;
                if(empty($input)){
                    return false;
                }
                return true;
            })->setError('Message can\'n be empty')
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function beforeInsert()
    {
        $this->created = gmdate('Y-m-d H:i:s');
    }
}