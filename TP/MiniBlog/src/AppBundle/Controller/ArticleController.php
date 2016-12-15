<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Commentaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

    /**
     * @param Request $request
     * @param Article $article
     * @Route("/{slug}/comment/new", name="comment_new")
     * @Method({"POST"})
     */

    public function newCommentAction (Request $request, Article $article) {
        if(!$article) throw $this->createNotFoundException();

        $comment = new Commentaire();

        $comment->setArticle($article)
            ->setAuthor($this->getUser())
            ->setMessage($request->get('commentaire'));


        $em = $this->getDoctrine()->getManager();

        //A partir de maintenant géré par doctrine
        $em->persist($comment);

        //Valider les modifications
        $em->flush();

        return $this->redirectToRoute('article_show', [
            "slug" => $article->getSlug()
        ]);


    }

}
