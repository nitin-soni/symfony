<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ProductImageType
 *
 * @author nitin
 */
class ProductImageType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title','text', array('required'=>'false'))
                ->add('file', 'file');
    }
    
    
    public function getName() {
        return 'botcoin_product_image';
    }

}
