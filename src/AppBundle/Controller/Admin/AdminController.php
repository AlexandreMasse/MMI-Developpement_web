<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AdminController
 * @package AppBundle\Controller
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 */


class AdminController extends Controller
{
    /**
     * @param $name
     * @Route("/", name="admin_index")
     */
    public function indexAction($name)
    {
        return $this->render("admin/index.html.twig");
    }
}
