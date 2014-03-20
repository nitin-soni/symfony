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
        /*
         * The file does not need to be added as "file" because it is referred
         * in the validation for File and SF will automatically know it is file.
         */
        //$builder->add("file", "file");
        /*
         * The file does not need to be added as "file" because it is referred
         * in the validation for File and SF will automatically know it is file.
         */
        return $builder
                        ->add("file", 'collection', array(
                            'type' => new FileType(),
                            'allow_add' => true,
                            'data' => array(new Bundle\Entity\File(),
                                new Bundle\Entity\File())
                        ))
                        ->add('save', 'submit');
    }

    public function getName() {
        return "filetype";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            //'data_class'=>'Bitcoin\AdminBundle\Entity\ProductImages',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention' => 'file'
        ));
    }

}
