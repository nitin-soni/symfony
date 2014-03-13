<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of Login
 *
 * @author nitin
 */
class Login extends AbstractType
{
    private $url;
    public function __construct($url) {
        $this->url = $url;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($this->url);
        $builder->setMethod('POST');
        $builder->add('email', 'text', array('attr'=>array("class"=>''), 'required'=>false));
        $builder->add('password', 'password', array('attr'=>array("class"=>''), 'required'=>false));
        $builder->add('login', 'submit');
    }
    
    public function getName() {
        return 'login';
    }

//put your code here
}
