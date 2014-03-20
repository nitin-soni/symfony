<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),),
        '_profiler_import' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:importAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/import',    ),  ),  4 =>   array (  ),),
        '_profiler_export' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:exportAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.txt',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler/export',    ),  ),  4 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),),
        'bitcoin_site_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\SiteBundle\\Controller\\IndexController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'bitcoin_product' => array (  0 =>   array (    0 => 'id',    1 => 'prdoductTitle',  ),  1 =>   array (    '_controller' => 'Bitcoin\\SiteBundle\\Controller\\IndexController::productDetailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'prdoductTitle',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/prduct-detail',    ),  ),  4 =>   array (  ),),
        'bitcoin_admin_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\AdminController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/',    ),  ),  4 =>   array (  ),),
        'bitcoin_admin_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login',    ),  ),  4 =>   array (  ),),
        'bitacoin_admin_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\AdminController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/logout',    ),  ),  4 =>   array (  ),),
        'productcategory' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product-category/',    ),  ),  4 =>   array (  ),),
        'productcategory_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-category',    ),  ),  4 =>   array (  ),),
        'productcategory_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product-category/new',    ),  ),  4 =>   array (  ),),
        'productcategory_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product-category/create',    ),  ),  4 =>   array (  ),),
        'productcategory_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-category',    ),  ),  4 =>   array (  ),),
        'productcategory_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-category',    ),  ),  4 =>   array (  ),),
        'productcategory_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete|get',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-category',    ),  ),  4 =>   array (  ),),
        'productcategory_grid' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::getProductCategoryAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product-category/grid',    ),  ),  4 =>   array (  ),),
        'productcategory_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductCategoryController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product-category/list',    ),  ),  4 =>   array (  ),),
        'product' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/',    ),  ),  4 =>   array (  ),),
        'product_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product',    ),  ),  4 =>   array (  ),),
        'product_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/new',    ),  ),  4 =>   array (  ),),
        'product_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/create',    ),  ),  4 =>   array (  ),),
        'product_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product',    ),  ),  4 =>   array (  ),),
        'product_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product',    ),  ),  4 =>   array (  ),),
        'product_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete|get',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product',    ),  ),  4 =>   array (  ),),
        'product_grid' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::getProductAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/grid',    ),  ),  4 =>   array (  ),),
        'product_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/list',    ),  ),  4 =>   array (  ),),
        'product_add' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::addAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/add',    ),  ),  4 =>   array (  ),),
        'product_upload' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductController::uploadAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/product/upload',    ),  ),  4 =>   array (  ),),
        'product_image_list' => array (  0 =>   array (    0 => 'productId',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'productId',    ),    1 =>     array (      0 => 'text',      1 => '/admin/product-image',    ),  ),  4 =>   array (  ),),
        'product_image_add' => array (  0 =>   array (    0 => 'productId',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::addAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/add',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'productId',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-image',    ),  ),  4 =>   array (  ),),
        'product_image_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\ProductImagesController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin/product-image',    ),  ),  4 =>   array (  ),),
        'productcategory_test' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\TestController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/test',    ),  ),  4 =>   array (  ),),
        'productcategory_testwe' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Bitcoin\\AdminBundle\\Controller\\TestController::testAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/test/test',    ),  ),  4 =>   array (  ),),
        '_uploader_upload_gallery' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'oneup_uploader.controller.gallery:upload',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_uploader/gallery/upload',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
