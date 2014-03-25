<?php

namespace Bitcoin\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductReviewType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname', 'text', array('required' => false))
            ->add('title', 'text', array('required' => false))
            ->add('review', 'textarea')
            ->add('rating', 'choice', array(
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5),
                    'expanded' => true,
                    'required' => false,
                    'empty_value' => false, 
                ))
            ->add('published', 'choice', array(
                    'choices' => array(0 => 'No', 1 => 'Yes'),
                    'required' => true,
                    'expanded' => true,
                ))
//            ->add('createdDate')
//            ->add('modifiedDate')
//            ->add('fkProduct')
            ->add('fkProduct', 'entity', array(
                    'class' => 'BitcoinAdminBundle:Product',
                    'property' => 'productTitle',
                    'multiple' => false,
                    'empty_value' => 'Choose an option',
                    'required' => false,
                    'mapped' => true
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bitcoin\AdminBundle\Entity\ProductReview'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bitcoin_adminbundle_productreview';
    }
}
