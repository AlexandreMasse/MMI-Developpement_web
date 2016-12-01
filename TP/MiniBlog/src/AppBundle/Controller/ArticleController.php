<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/articles", name="article_list")
     */
    public function listAction()
    {
       $articles = $this->getDoctrine()->getRepository("AppBundle:Article")->findAll();

        return $this->render("article/list.html.twig", [
            'articles' => $articles
        ]);
    }
}
