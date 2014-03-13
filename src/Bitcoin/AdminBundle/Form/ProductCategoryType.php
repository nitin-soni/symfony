<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductCategoryType extends AbstractType {
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('categoryName', 'text', array('required' => false))
                ->add('description', 'textarea', array('required' => false))
                ->add('submit', 'submit');

//        $builder->add('fkParent', 'choice', array(
//            'choices' => $this->getAllCategory(),
//            'required' => false,
//        ));
        $builder->add('fkParent', 'entity', array(
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
            'data_class' => 'Bitcoin\AdminBundle\Entity\ProductCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bitcoin_adminbundle_productcategory';
    }


}
