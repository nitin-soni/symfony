<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Product extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('productTitle', 'text', array('required' => true))
                ->add('description', 'textarea', array('required' => false))
                ->add('price', 'text', array('required' => true))
                ->add('fkProductCat', 'entity', array(
                    'class' => 'BitcoinAdminBundle:ProductCategory',
                    'property' => 'categoryName',
                    'multiple' => false,
                    'empty_value' => 'Choose an option',
                    'required' => false,
                    'mapped' => true
                ))
                ->add('featured', 'choice', array(
                    'choices' => array(0 => 'No', 1 => 'Yes'),
                    'required' => true,
                    'expanded' => true,
                ))
                ->add('priceListed', 'text', array('required' => true))
                ->add('sku', 'text', array('required' => true))
                ->add('images', 'collection', array(
                    'type'   => new ProductImageType(),
                    'allow_add' => true,
                    'mapped' => true
                ))
        ;
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
