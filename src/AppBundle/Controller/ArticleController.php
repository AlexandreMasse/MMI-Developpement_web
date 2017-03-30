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
    public function newCommentAction (Request $request, Article $article) 
    {
        
        //Erreur si l'article n'existe pas
        if(!$article) throw $this->createNotFoundException();

        //Création de l'entité Commentaire
        $comment = new Commentaire();

        //Commentaire appartient à l'article en cours
        $comment->setArticle($article);

        //l'utilisateur connecté est l'auteur
        $comment->setAuthor($this->getUser());

        //Attribution du message récupéré via formulaire
        $comment->setMessage($request->get('commentaire'));

        //Récupération de l'entityManager
        $em = $this->getDoctrine()->getManager();

        //On persiste  l'entité
        $em->persist($comment);

        //On valide les modifications avec flush
        $em->flush();

        //Redirection vers la vue de l'article en cours
        return $this->redirectToRoute('article_show', [
            "slug" => $article->getSlug()
        ]);

    }

}
