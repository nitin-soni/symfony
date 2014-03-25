<?php

namespace Bitcoin\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of Login
 *
 * @author nitin
 */
class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('POST');
        $builder->add('emailAddress', 'text', array('attr'=>array("class"=>''), 'required'=>false));
        $builder->add('password', 'password', array('attr'=>array("class"=>''), 'required'=>false));
        //$builder->add('login', 'submit');
    }
    
    public function getName() {
        return 'login';
    }

//put your code here
}
