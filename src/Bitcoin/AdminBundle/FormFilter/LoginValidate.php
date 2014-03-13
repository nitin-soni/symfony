<?php

namespace Bitcoin\AdminBundle\FormFilter;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of LoginValidate
 *
 * @author nitin
 */
class LoginValidate {

    /**
     * @Assert\NotBlank
     */
    public $password;

    /**
     * @Assert\Email
     * @Assert\NotBlank
     */
    public $email;

}
