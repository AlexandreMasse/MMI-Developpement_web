<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 * @Route("/article")
 * @Security("has_role('ROLE_ADMIN')")
 */


class ArticleController extends Controller
{
    /**
     * @param $name
     * @Route("/", name="admin_article_index")
     */
    public function indexAction()
    {
        //Récupération de tous les articles
        $articles = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();

        return $this->render("/admin/articles/index.html.twig", [
            "articles" => $articles
        ]);
    }
}
