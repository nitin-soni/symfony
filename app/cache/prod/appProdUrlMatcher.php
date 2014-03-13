<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/admin')) {
            // bitcoin_admin_homepage
            if (0 === strpos($pathinfo, '/admin/hello') && preg_match('#^/admin/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bitcoin_admin_homepage')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\DefaultController::indexAction',));
            }

            if (0 === strpos($pathinfo, '/admin/login')) {
                // bitcoin_admin_login
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\LoginController::loginAction',  '_route' => 'bitcoin_admin_login',);
                }

                // _security_check
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\LoginController::securityCheckAction',  '_route' => '_security_check',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
