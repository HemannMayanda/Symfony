<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    /*public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }*/

    public function createUser(EntityManagerInterface $entityManager):Response{
        $user = new User();
        $user->setLogin('DamD');
        $user->setPassword('azerty');
        $user->setFirstname('Damien');
        $user->setLastname('Dupont');


        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('User enregistré, id : '.$user->getId());
    }
}
