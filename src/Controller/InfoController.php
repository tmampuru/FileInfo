<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;

  use Symfony\Bridge\Twig\Extension\FormExtension;
  use Symfony\Bridge\Twig\Form\TwigRendererEngine;
  use Symfony\Component\Form\FormRenderer;
  use Symfony\Component\Form\Forms;
  use Twig\Environment;
  use Twig\Loader\FilesystemLoader;
  use Twig\RuntimeLoader\FactoryRuntimeLoader;

  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



  class InfoController extends AbstractController
  {
    /**
      *@Route("/")
      *
    */
    public function index()
    {
      //
      return $this->render('info/index.html.twig');
    }

    /*
    * @Route("info/search", name="info_search")
    * Method({"GET", "POST"})
    */
  }

?>
