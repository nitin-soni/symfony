<?php

namespace Bitcoin\SiteBundle\Twig\Extension;

class CustomExtension extends \Twig_Extension {

    public function getFunctions() {
        return array(
            //new \Twig_SimpleFunction('show_error', array($this, 'showError'))
            'show_category' => new \Twig_Function_Method($this, 'show_category', array('is_safe' => array('html'))),
        );
    }

    public function show_category($categories) {
        $list = $this->parseCategory($categories, 0);
        return $list;
    }

    private function parseCategory($categories, $level = 0) {
        $result = '';
        foreach ($categories as $category) {
            $result .= '<li class="level' . $level . ' nav-' . $category->getId() . '">';
            $result .= '<a href="#" class=""><span>' . $category->getCategoryName() . '</span></a>';
            $result .= '<i class="clear"></i>';
            $child = $category->getChild();
            if (count($child) > 0) {
                $result .= '<ul class="level1">';
                $result .= $this->parseCategory($child, $level+1);
                $result .= '</ul>';
            }
            //$result .= count($child).'</li>';
            $result .= '<i class="clear"></i>';
            $result .= '</li>';
        }
        return $result;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'custom';
    }

}
