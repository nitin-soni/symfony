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
            ->add('fullname')
            ->add('title')
            ->add('review')
            ->add('rating')
            ->add('published')
            ->add('createdDate')
            ->add('modifiedDate')
            ->add('fkProduct')
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
