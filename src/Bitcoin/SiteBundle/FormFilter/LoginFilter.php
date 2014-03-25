<?php

namespace Bitcoin\SiteBundle\FormFilter;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of LoginValidate
 *
 * @author nitin
 */
class LoginFilter {

    /**
     * @Assert\NotBlank
     */
    public $password;

    /**
     * @Assert\Email
     * @Assert\NotBlank
     */
    public $emailAddress;

}
