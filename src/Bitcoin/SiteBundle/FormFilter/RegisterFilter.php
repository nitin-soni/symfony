<?php


namespace Bitcoin\SiteBundle\FormFilter;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Description of RegsiterFilter
 *
 * @author nitin
 */
class RegisterFilter {
    
    /**
     * @Assert\NotBlank
     */
    public $firstName;
    
    /**
     * @Assert\NotBlank
     */
    public $lastName;
    
    /**
     * @Assert\Email
     * @Assert\NotBlank
     */
    public $emailAddress;
    
    
    /**
     * Assert\NotBlank
     */
    public $password;

    
    /**
     * 
     */
    //public $subscribed;
}
