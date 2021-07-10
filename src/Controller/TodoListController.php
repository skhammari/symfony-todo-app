<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Task;

class TodoListController extends AbstractController
{
    #[Route('/todo/list', name: 'todo_list')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TodoListController.php',
        ]);
    }

    #[Route('/list/add', name: 'list_add')]
    public function add() {
        $entityManager = $this->getDoctrine()->getManager();

        $task = new Task();
        $task->setTitle("test");
        $task->setCreatedAt(new \DateTimeImmutable());
        $task->setUpdatedAt(new \DateTimeImmutable());
        $task->setDueDate(new \DateTimeImmutable());
        $task->setStatus(1);

        $entityManager->persist($task);
        $entityManager->flush();

        return New Response("the task has been added!");
    }
}
