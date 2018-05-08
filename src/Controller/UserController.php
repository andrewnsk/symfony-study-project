<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $UserRepository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->UserRepository = $entityManager->getRepository('App:User');
    }

    /**
     * @Route("/user", name="user")
     */
    public function index()
    {


        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $this->UserRepository->getAllUsers()
        ]);
    }
}
