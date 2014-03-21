<?php

namespace Bitcoin\SiteBundle\FormFilter;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of ReviewFilter
 *
 * @author nitin
 */
class ReviewFilter {

    /**
     * @Assert\NotBlank
     */
    public $fullname;

    /**
     * @Assert\NotBlank
     */
    public $title;
    
    /**
     * @Assert\NotBlank
     */
    public $rating;
    
    /**
     * @Assert\NotBlank
     */
    public $review;
    
    /**
     * Assert\NotBlank
     */
    public $captcha;
    
    public $fkProduct;
    
}
