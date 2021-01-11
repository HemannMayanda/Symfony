<?php


namespace App\Controller;




use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    function hello($prenom):Response{
        $liste=[];
        return $this->render('hello.html.twig',[
            'prenom'=> $prenom
        ]);
    }

    function helloListe():Response{
        return $this->render('helloliste.html.twig',[
            'liste' => [
                'Patrick',
                'Daniel'
            ]
        ]);
    }

    function form():Response{
        return new Response("<html>
            <body>
                <form method='post'>
                    Nom : <input name='name'>
                    <input type='submit'>
                </form>
            </body>
        </html>");
    }

    function formReceive(Request $request):Response{
        //$formData = $request->getContent();
        $name = $request->request->get('name');
        return new Response("Merci");
    }
}