<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
