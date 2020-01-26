<?php
  namespace App\Controller;
  use App\Entity\Files;
  use App\Form\ImageType;
  
  use Symfony\Component\Finder\Finder;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\UploadedFile;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  

  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


  class FileController extends AbstractController
  {
    /**
      *@Route("/files")
      *
    */
    public function new(Request $request)
    {
      
      $images = new Files();
      $finder = new Finder();

      $form = $this->createForm(ImageType::class, $images);
      $form->handleRequest($request);
      
      if ($form->isSubmitted() && $form->isValid()) {
          $data = $form->getData();
          var_dump($data);
          die;
        return $this->render('home/index.html.twig');
    }
      return $this->render('files/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }

    /**
      *@Route("/", name="info")
      *
    */
    public function info()
    {
      //
      return $this->render('info/index.html.twig');
    }

    /*
    * @Route("info/search", name="info_search")
    * Method({"GET", "POST"})
    */

    /**
      *@Route("/home")
      *
    */
    public function show()
    {
      // createfrombuilder gets form factory
      //
      return $this->render('home/index.html.twig');
      
    }
  }
?>
