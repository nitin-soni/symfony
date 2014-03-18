<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bitcoin\AdminBundle\Form\Login;
use Bitcoin\AdminBundle\FormFilter\LoginValidate;
use Bitcoin\AdminBundle\BitcoinAdminBundle;
/**
 * Description of LoginController
 *
 * @author nitin
 */
class LoginController extends Controller {

    public $session;
    public $container;
    public function __construct() {
        $this->container = BitcoinAdminBundle::getContainer();
        $this->session = $this->container->get('session');
    }

    public function loginAction(Request $request) {
        //Create Form
        $submitUrl = $this->generateUrl('bitcoin_admin_login');
        $form = $this->createForm(new Login($submitUrl), new LoginValidate());
        $form->handleRequest($request);
        //Attache Validation
        //Handle form submission
        if ($request->getMethod() == "POST") {
            //Validate form
            if ($form->isValid()) {
                $formData = $form->getData();
                //Search for User
                $search = array(
                    'email' => $formData->email,
                );
                $user = $this->getDoctrine()->getRepository('BitcoinAdminBundle:AdminUser')->findOneBy($search);

                //Match Password
                if ($user && $user->getPassword() === md5($formData->password)) {
                    $userData = array(
                        'idAdminUser' => $user->getIdAdminUser(),
                        'firstName' => $user->getFirstName(),
                        'lastName' => $user->getLastName(),
                    );
                    //Create User Session
                    $this->session->set('userData', $userData);
                    $this->session->set('loggedIn', TRUE);
                    return $this->redirect($this->generateUrl('bitcoin_admin_homepage'));
                }
                $this->session->getFlashBag()->add('notice', 'You entered incorrect email or password.');
            }
        }

        $pageData = array(
            'name' => 'Login',
            'form' => $form->createView()
        );
        
        return $this->render('BitcoinAdminBundle:Login:login.html.twig', $pageData);
    }
    
}
