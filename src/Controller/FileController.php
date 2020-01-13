<?php
  namespace App\Controller;

  use App\Entity\Files;
  use App\Form\ImageType;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;

  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  use Symfony\Component\HttpFoundation\File\UploadedFile;


  class FileController extends AbstractController
  {
    /**
      *@Route("/")
      *
    */
    public function new(Request $request)
    {
      $images = new Files();
      $form = $this->createForm(ImageType::class, $images);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $data = $form->getData();
          
        return $this->render('home/index.html.twig');
    }

      return $this->render('files/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }
  }

?>
