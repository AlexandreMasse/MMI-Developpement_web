<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @param Request $request
     * @Route("/article/{slug}", name="article_show")
     */
    public function showAction(Request $request, Article $article ){
        return $this->render("article/show.html.twig", [
            "article" => $article
        ]);
    }

}
