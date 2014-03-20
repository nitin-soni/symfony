<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ProductImageType
 *
 * @author nitin
 */
class ProductImageType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder ->add('title', 'text', array('required' => false))
                        ->add('file', 'file', array('required' => false));
    }

    public function getName() {
        return "filetype";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class'=>'Bitcoin\AdminBundle\Entity\ProductImages',
        ));
    }

}
