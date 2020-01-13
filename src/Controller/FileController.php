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
          $datass = $form->getRealPath();

          $newarray = (array) $datass;

          print_r($datass);

          // ... perform some action, such as saving the data to the database

        return $this->render('home/index.html.twig');
    }

      return $this->render('files/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }
  }

?>
