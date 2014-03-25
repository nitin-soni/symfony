<?php

namespace Bitcoin\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of RegsterType
 *
 * @author nitin
 */
class RegisterType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firstName', 'text')
                ->add('lastName', 'text')
                ->add('emailAddress', 'text')
//                ->add('password', 'text')
//                ->add('confirnPassword', 'text')
//                ->add('subscribed', 'checkbox', array(
//                    'label'     => 'Sign Up for Newsletter',
//                    'required'  => false,
//                ));
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options'  => array('label' => 'first', 'error_bubbling' => true),
                    'second_options' => array('label' => 'second', 'error_bubbling' => true),
                    
                ))
        ;
    }

    public function getName() {
        return 'site_regiter';
    }

}
