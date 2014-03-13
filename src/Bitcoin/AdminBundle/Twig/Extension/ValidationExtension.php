<?php

namespace Bitcoin\AdminBundle\Twig\Extension;

use Bitcoin\AdminBundle\BitcoinAdminBundle;

class ValidationExtension extends \Twig_Extension {

    public function getFunctions() {
        return array(
            //new \Twig_SimpleFunction('show_error', array($this, 'showError'))
            'show_error' => new \Twig_Function_Method($this, 'showError', array('is_safe' => array('html'))),
            'show_name' => new \Twig_Function_Method($this, 'showName', array('is_safe' => array('html'))),
        );
    }

    public function showError($error, $class = "error") {
        $message = NULL;
        $errors = $error->vars['errors'];
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                if (NULL !== $message) {
                    $message .= '<br />';
                }
                $message .= $error->getMessage();
            }
        }
        return '<div class="' . $class . '">' . $message . '</div>';
    }
    
    public function showName() {
         $container = BitcoinAdminBundle::getContainer();
         $session = $container->get('session');
         $user = $session->get('loggedIn', FALSE);
         echo '<pre>'; var_dump($user); die;
        return '<div class="' . $class . '">' . $message . '</div>';
    }
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'validation';
    }

}
