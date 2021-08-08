<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public const MESSAGE = 'Welcome to your new controller!';
    public const PATH = 'src/Controller/DefaultController.php';
    public const HTML_PAGE_TITLE = 'This is an html response';

    /**
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'title' => static::HTML_PAGE_TITLE
        ]);
    }

    /**
     * @return Response
     */
    #[Route('/api', name: 'api')]
    public function api(): Response
    {
        return $this->json([
            'message' => static::MESSAGE,
            'path' => static::PATH,
        ]);
    }
}
