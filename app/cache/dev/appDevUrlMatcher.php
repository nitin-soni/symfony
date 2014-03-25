<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // bitcoin_site_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'bitcoin_site_homepage');
            }

            return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\IndexController::indexAction',  '_route' => 'bitcoin_site_homepage',);
        }

        if (0 === strpos($pathinfo, '/prduct-')) {
            // bitcoin_product
            if (0 === strpos($pathinfo, '/prduct-detail') && preg_match('#^/prduct\\-detail/(?P<id>[^/]++)/(?P<prdoductTitle>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bitcoin_product')), array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\IndexController::productDetailAction',));
            }

            // bitcoin_product_review
            if (0 === strpos($pathinfo, '/prduct-review') && preg_match('#^/prduct\\-review/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bitcoin_product_review')), array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\SecureController::submitReviewAction',));
            }

        }

        if (0 === strpos($pathinfo, '/account')) {
            if (0 === strpos($pathinfo, '/account/register')) {
                // bitcoin_site_register
                if ($pathinfo === '/account/register') {
                    return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\UserController::registerAction',  '_route' => 'bitcoin_site_register',);
                }

                // bitcoin_site_register_submit
                if ($pathinfo === '/account/register-submit') {
                    return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\UserController::registerSubmitAction',  '_route' => 'bitcoin_site_register_submit',);
                }

            }

            // bitcoin_site_authenticate
            if ($pathinfo === '/account/authenticate') {
                return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\UserController::authenticateAction',  '_route' => 'bitcoin_site_authenticate',);
            }

            // bitcoin_user_logout
            if ($pathinfo === '/account/logout') {
                return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\UserController::logoutAction',  '_route' => 'bitcoin_user_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/cart')) {
            // bitcoin_cart
            if (rtrim($pathinfo, '/') === '/cart') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'bitcoin_cart');
                }

                return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\IndexController::indexAction',  '_route' => 'bitcoin_cart',);
            }

            // bitcoin_cart_add_ajax
            if ($pathinfo === '/cart/add-to-cart') {
                return array (  '_controller' => 'Bitcoin\\SiteBundle\\Controller\\CartController::addtoCartAction',  '_route' => 'bitcoin_cart_add_ajax',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // bitcoin_admin_homepage
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'bitcoin_admin_homepage');
                }

                return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'bitcoin_admin_homepage',);
            }

            if (0 === strpos($pathinfo, '/admin/log')) {
                // bitcoin_admin_login
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\LoginController::loginAction',  '_route' => 'bitcoin_admin_login',);
                }

                // bitacoin_admin_logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\AdminController::logoutAction',  '_route' => 'bitacoin_admin_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/product')) {
                if (0 === strpos($pathinfo, '/admin/product-category')) {
                    // productcategory
                    if (rtrim($pathinfo, '/') === '/admin/product-category') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'productcategory');
                        }

                        return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::listAction',  '_route' => 'productcategory',);
                    }

                    // productcategory_show
                    if (preg_match('#^/admin/product\\-category/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'productcategory_show')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::showAction',));
                    }

                    // productcategory_new
                    if ($pathinfo === '/admin/product-category/new') {
                        return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::newAction',  '_route' => 'productcategory_new',);
                    }

                    // productcategory_create
                    if ($pathinfo === '/admin/product-category/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_productcategory_create;
                        }

                        return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::createAction',  '_route' => 'productcategory_create',);
                    }
                    not_productcategory_create:

                    // productcategory_edit
                    if (preg_match('#^/admin/product\\-category/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'productcategory_edit')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::editAction',));
                    }

                    // productcategory_update
                    if (preg_match('#^/admin/product\\-category/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_productcategory_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'productcategory_update')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::updateAction',));
                    }
                    not_productcategory_update:

                    // productcategory_delete
                    if (preg_match('#^/admin/product\\-category/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE', 'GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE', 'GET', 'HEAD'));
                            goto not_productcategory_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'productcategory_delete')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::deleteAction',));
                    }
                    not_productcategory_delete:

                    // productcategory_grid
                    if ($pathinfo === '/admin/product-category/grid') {
                        return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::getProductCategoryAction',  '_route' => 'productcategory_grid',);
                    }

                    // productcategory_list
                    if ($pathinfo === '/admin/product-category/list') {
                        return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::listAction',  '_route' => 'productcategory_list',);
                    }

                }

                // product
                if (rtrim($pathinfo, '/') === '/admin/product') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'product');
                    }

                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::listAction',  '_route' => 'product',);
                }

                // product_show
                if (preg_match('#^/admin/product/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_show')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::showAction',));
                }

                // product_new
                if ($pathinfo === '/admin/product/new') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::addAction',  '_route' => 'product_new',);
                }

                // product_create
                if ($pathinfo === '/admin/product/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_product_create;
                    }

                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::createAction',  '_route' => 'product_create',);
                }
                not_product_create:

                // product_edit
                if (preg_match('#^/admin/product/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_edit')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::editAction',));
                }

                // product_update
                if (preg_match('#^/admin/product/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_product_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_update')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::updateAction',));
                }
                not_product_update:

                // product_delete
                if (preg_match('#^/admin/product/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE', 'GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE', 'GET', 'HEAD'));
                        goto not_product_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_delete')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::deleteAction',));
                }
                not_product_delete:

                // product_grid
                if ($pathinfo === '/admin/product/grid') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::getProductAction',  '_route' => 'product_grid',);
                }

                // product_list
                if ($pathinfo === '/admin/product/list') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::listAction',  '_route' => 'product_list',);
                }

                // product_add
                if ($pathinfo === '/admin/product/add') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::addAction',  '_route' => 'product_add',);
                }

                // product_upload
                if ($pathinfo === '/admin/product/upload') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::uploadAction',  '_route' => 'product_upload',);
                }

                if (0 === strpos($pathinfo, '/admin/product-')) {
                    if (0 === strpos($pathinfo, '/admin/product-image')) {
                        // product_image_list
                        if (preg_match('#^/admin/product\\-image/(?P<productId>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_image_list')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::listAction',));
                        }

                        // product_image_add
                        if (preg_match('#^/admin/product\\-image/(?P<productId>[^/]++)/add$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_image_add')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::addAction',));
                        }

                        // product_image_delete
                        if (preg_match('#^/admin/product\\-image/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_image_delete')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::deleteAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/product-review')) {
                        // product-review
                        if (rtrim($pathinfo, '/') === '/admin/product-review') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'product-review');
                            }

                            return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::listAction',  '_route' => 'product-review',);
                        }

                        // product-review_show
                        if (preg_match('#^/admin/product\\-review/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product-review_show')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::showAction',));
                        }

                        // product-review_new
                        if ($pathinfo === '/admin/product-review/new') {
                            return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::newAction',  '_route' => 'product-review_new',);
                        }

                        // product-review_create
                        if ($pathinfo === '/admin/product-review/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_productreview_create;
                            }

                            return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::createAction',  '_route' => 'product-review_create',);
                        }
                        not_productreview_create:

                        // product-review_edit
                        if (preg_match('#^/admin/product\\-review/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product-review_edit')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::editAction',));
                        }

                        // product-review_update
                        if (preg_match('#^/admin/product\\-review/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_productreview_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product-review_update')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::updateAction',));
                        }
                        not_productreview_update:

                        // product-review_delete
                        if (preg_match('#^/admin/product\\-review/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'DELETE', 'GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('POST', 'DELETE', 'GET', 'HEAD'));
                                goto not_productreview_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product-review_delete')), array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::deleteAction',));
                        }
                        not_productreview_delete:

                        // product-review_grid
                        if ($pathinfo === '/admin/product-review/grid') {
                            return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::getReviewAction',  '_route' => 'product-review_grid',);
                        }

                        // product-review_list
                        if ($pathinfo === '/admin/product-review/list') {
                            return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductReviewController::listAction',  '_route' => 'product-review_list',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/test')) {
                // productcategory_test
                if ($pathinfo === '/admin/test') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\TestController::indexAction',  '_route' => 'productcategory_test',);
                }

                // productcategory_testwe
                if ($pathinfo === '/admin/test/test') {
                    return array (  '_controller' => 'Bitcoin\\AdminBundle\\Controller\\TestController::testAction',  '_route' => 'productcategory_testwe',);
                }

            }

        }

        // gregwar_captcha.generate_captcha
        if (0 === strpos($pathinfo, '/_gcb/generate-captcha') && preg_match('#^/_gcb/generate\\-captcha/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'gregwar_captcha.generate_captcha')), array (  '_controller' => 'Gregwar\\CaptchaBundle\\Controller\\CaptchaController::generateCaptchaAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
