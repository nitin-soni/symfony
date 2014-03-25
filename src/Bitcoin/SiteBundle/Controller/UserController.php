<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Bitcoin\AdminBundle\Entity\User;
use Bitcoin\SiteBundle\Form\RegisterType;
use Bitcoin\SiteBundle\FormFilter\RegisterFilter;
use Bitcoin\SiteBundle\Form\LoginType;
use Bitcoin\SiteBundle\FormFilter\LoginFilter;
use Bitcoin\SiteBundle\Controller\FrontController;
/**
 * Description of UserController
 *
 * @author nitin
 */
class UserController extends FrontController {
    

    public function  authenticateAction(Request $request)
    {
        $form = $this->createLoginForm();
        $form->handleRequest($request);
        
        //Attache Validation
        //Handle form submission
        if ($request->getMethod() == "POST") {
            //Validate form
            if ($form->isValid()) {
                $formData = $form->getData();
                //Search for User
                $search = array(
                    'emailAddress' => $formData->emailAddress,
                );
                $user = $this->getDoctrine()->getRepository('BitcoinAdminBundle:User')->findOneBy($search);

                //Match Password
                if ($user && $user->getPassword() === md5($formData->password)) {
                    $userData = array(
                        'idUser' => $user->getIdUser(),
                        'firstName' => $user->getFirstName(),
                        'lastName' => $user->getLastName(),
                    );
                    //Create User Session
                    $this->session->set('userData', $userData);
                    $this->session->set('loggedIn', TRUE);
                    return $this->redirect($this->generateUrl('bitcoin_site_homepage'));
                }
                $this->session->getFlashBag()->add('notice', 'You entered incorrect email or password.');
            }
        }
        
        $this->data['login_form'] = $form->createView();
        $this->data['register_form'] = $this->createRegisterForm()->createView();
        return $this->render('BitcoinSiteBundle:User:regiter.html.twig', $this->data);
    }
    
    public function registerAction(Request $request)
    {
        $this->data['register_form'] = $this->createRegisterForm()->createView();
        $this->data['login_form'] = $this->createLoginForm()->createView();
        return $this->render('BitcoinSiteBundle:User:regiter.html.twig', $this->data);
    }
    
    public function registerSubmitAction(Request $request)
    {
        $form = $this->createRegisterForm();
        $form->handleRequest($request);
        
        //Check if form submitted
        if ($request->getMethod() == 'POST')
        {
            if($form->isValid()) 
            {
                //Get form data by user
                $formData = $form->getData();
                
                //Get User Entity object
                $entity = new User();
                $entity->setFirstName($formData->firstName);
                $entity->setLastName($formData->lastName);
                $entity->setEmailAddress($formData->emailAddress);
                $entity->setPassword(md5($formData->password));
                $entity->setCreatedDate();
                $entity->setModifiedDate();
                
                //Persist
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();
                
                $this->session->getFlashBag()->add('notice', 'Account created successfully. You Can login now.');
                return $this->redirect($this->generateUrl('bitcoin_site_register'));
            }
        }
        $this->data['register_form'] = $form->createView();
        $this->data['login_form'] = $this->createLoginForm()->createView();
        return $this->render('BitcoinSiteBundle:User:regiter.html.twig', $this->data);
    }
    
    /**
     * Logout user
     * @return type
     */
    public function logoutAction() {
        $this->session->remove('loggedIn');
        $this->session->remove('userData');
        return $this->redirect($this->generateUrl('bitcoin_site_register'));
    }

    /**
     * Create Regiter Form
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createRegisterForm() {
        $form = $this->createForm(new RegisterType(), new RegisterFilter(), array(
            'action' => $this->generateUrl('bitcoin_site_register_submit'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => '<span><span>Submit Review</span></span>'));

        return $form;
    }
    
    /**
     * Creates a login form.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createLoginForm() {
        $form = $this->createForm(new LoginType(), new LoginFilter(), array(
            'action' => $this->generateUrl('bitcoin_site_authenticate'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => '<span><span>Submit Review</span></span>'));

        return $form;
    }
}
