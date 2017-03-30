<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction() {

        /** @var AuthenticationUtils $authenticationUtils */
        $authenticationUtils = $this->get('security.authentication_utils');

        $lastUsername = $authenticationUtils->getLastUsername();

        $error = $authenticationUtils->getLastAuthenticationError();

        /** @var UserPasswordEncoder $passwordEncoder */
        $passwordEncoder = $this->get('security.password_encoder');



        /* Pour rajouter un utilisateur manuellement  la base de donnée
         *
         *
        $em = $this->getDoctrine()->getManager();

        $user = new Utilisateur();
        $user->setLogin('alex')
            ->setEmail('alexandre.masse94@gmail.com')
            ->setPrenom('Alexandre')
            ->setNom('Masse')
            ->setCreatedAt(new \DateTime())
            ->setMdp($passwordEncoder->encodePassword($user, 'mdp'));

        $em->persist($user);
        $em->flush();

        */

        return $this->render("security/login.html.twig", array(
            'last_username' => $lastUsername,
            'error' => $error
        ));



    }
}
