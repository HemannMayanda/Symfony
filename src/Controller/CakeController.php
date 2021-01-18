<?php

namespace App\Controller;

use App\Entity\Cake;
use App\Entity\Ingredient;
use App\Repository\CakeRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CakeController extends AbstractController
{
    /**
     * @Route("/cake", name="cake")
     */
    /*public function index(): Response
    {
        return $this->render('cake/index.html.twig', [
            'controller_name' => 'CakeController',
        ]);
    }*/

    public function createCake(EntityManagerInterface $entityManager):Response{
        $cake = new Cake();
        $cake->setName("Tarte aux pommes");
        $cake->setIsSweet(true);
        /*$pomme = new Ingredient();
        $pomme->setName('Pomme');
        $pomme->setIsAllergen(false);
        $cake->addIngredient($pomme);*/

        $entityManager->persist($cake);
        $entityManager->flush();

        //return new Response('Cake enregistré, id : '.$cake->getId());
        return $this->render('cake/cake.html.twig',['cake'=>$cake]);
    }

    public function getById(int $id, CakeRepository $cakeRepository):Response{
        $cake = $cakeRepository->find($id);
    }
}
