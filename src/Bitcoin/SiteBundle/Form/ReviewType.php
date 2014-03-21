<?php

namespace Bitcoin\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ReviewType
 *
 * @author nitin
 */
class ReviewType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->setMethod('POST');
        $builder->add('fullname', 'text', array('attr' => array("class" => ''), 'required' => false));
        $builder->add('title', 'text', array('attr' => array("class" => ''), 'required' => false));
        $builder->add('rating', 'choice', array(
            'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5),
            'expanded' => true,
            'required' => false,
            'empty_value' => false, 
        ));
        $builder->add('fkProduct', 'hidden', array('required' => false));
        $builder->add('review', 'textarea', array('required' => false));
//        $builder->add('captcha', 'captcha', array(
//            'width' => 200,
//            'height' => 50,
//            'length' => 4,
//            'required' => false,
//            'invalid_message'  => 'Invalid Captcha'
//        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            //'data_class' => 'Bitcoin\AdminBundle\Entity\ProductReview'
        ));
    }
    
    public function getName() {
        return 'review_form';
    }

}
