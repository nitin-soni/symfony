<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('productTitle', 'text', array('required' => false))
                ->add('description', 'textarea', array('required' => false))
                ->add('price', 'text', array('required' => false))
                //->add('createdDate')
                //->add('modifiedDate')
                //->add('fkProductCat')
                ->add('fkProductCat', 'entity', array(
                    'class' => 'BitcoinAdminBundle:ProductCategory',
                    'property' => 'categoryName',
                    'multiple' => false,
                    'empty_value' => 'Choose an option',
                    'required' => false,
                    'mapped' => true
                ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bitcoin\AdminBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bitcoin_adminbundle_product';
    }

}
