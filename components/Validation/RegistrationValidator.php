<?php
namespace Components\Validation;

use Components\Model\User;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\Confirmation;

class RegistrationValidator extends Validation
{
    public function initialize()
    {
        $this->add('email', new PresenceOf([
            'message' => 'Email is required',
        ]));

        $this->add('email', new Email([
            'message' => 'Email is not valid',
        ]));

        $this->add('email', new Uniqueness([
            'model'   => User::class,
            'message' => 'Email already exist'
        ]));

        $this->add('password', new Confirmation([
            'with'    => 'repassword',
            'message' => 'Password and Repeat Password must match',
        ]));
    }
}
