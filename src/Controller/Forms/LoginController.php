<?php


namespace App\Controller\Forms;


use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private $accounts = [['login'=>'admin','password'=>'Azerty123456!'],['login'=>'user','password'=>'987654uioP!']] ;

    /*private function getLoginForm():FormInterface{
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('login',TextType::class);
        $formBuilder->add('password',PasswordType::class);
        $formBuilder->add('submit',SubmitType::class);

        $form=$formBuilder->getForm();
        return $form;
    }*/

    public function loginForm(Request $request):Response{
        //$formView = $this->getLoginForm()->createView();
        $form = $this->createForm(LoginFormType::class);
        $message = null;
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $login = $data['login'];
            $password = $data['password'];

            return $this->redirectToRoute('hello',['prenom'=>$data['login']]);
        }else if($form->isSubmitted()){
            $message = "Login ou mot de passe mal formé !";
        }

        $formView = $form->createView();
        return $this->render('login.html.twig',['form'=>$formView,'message'=>$message]);
    }

    /*public function loginPost(Request $request):Response{
        //$form = $this->getLoginForm();
        $form = $this->createForm(LoginFormType::class);


        return $this->render('login_result.html.twig',['message'=>$returnMsg]);
    }*/

}