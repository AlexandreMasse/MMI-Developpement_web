<?php

namespace AppBundle\Controller\Admin\Article;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 * @Route("/admin/article")
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

        return $this->render("/admin/article/index.html.twig", [
            "articles" => $articles
        ]);
    }

    /**
     * @param Request $request
     * @Route ("/add", name="admin_article_add")
     */
    public function addAction(Request $request) {
        if ($request->getMethod()=="GET"){
            return $this->render("admin/article/add.html.twig");
        } else {
            $article = new Article();
            $article->setTitle($request->get("title"))
            ->setText($request->get("text"))
            ->setAuthor($this->getUser());

            $em = $this->getDoctrine()->getManager();

            //faire persister la variable en bdd
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("admin_article_index");
        }
    }


    /**
     * @param Request $request
     * @Route ("/edit/{id}", name="admin_article_edit")
     */

    public function editAction (Request $request, Article $article) {
        if ($request->getMethod() == "GET") {
            return $this->render("admin/article/edit.html.twig", [
                "article" => $article
            ]);
        } else {
            $article->setTitle($request->get("title"))
                ->setText($request->get("text"))
                ->setAuthor($this->getUser())
                ->setEditedAt(new \DateTime());


            $em = $this->getDoctrine()->getManager();


            $em->flush();

            return $this->redirectToRoute("admin_article_index");
        }

    }



    /**
     * @param Request $request
     * @Route ("/delete/{id}", name="admin_article_delete")
     */

    public function removeAction (Request $request, $id){
        //Trouver l'article selon id
        $article = $this->getDoctrine()->getRepository("AppBuddle:Article")->find($id);
        //supprimer article
        $this->getDoctrine()->getManager()->remove($article);

        $this->getDoctrine()->getManager()->flush();


    }


}
