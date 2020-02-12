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
      *@Route("/")
      *
    */
    public function new(Request $request)
    {
      $images = new Files();

      $form = $this->createForm(ImageType::class, $images);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $file = $_FILES['image'];

        $file_name = $file['name']['images']['0'];
        $file_tmp = $file['tmp_name']['images']['0'];
        $file_size = $file['size']['images']['0'];
        $file_error = $file['error']['images']['0'];


        // Get the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $extensions = array('jpg', 'png');

          if (in_array($file_ext, $extensions)) {
            if ($file_error === 0) {

              $file_name_new = uniqid('', true) . '.' . $file_ext;
              $file_destination = 'uploads/' . $file_name_new;

                if(move_uploaded_file($file_tmp, $file_destination)) {
                  $exif = exif_read_data($file_destination, 0, true);
                  echo "<br><br><br>";
                  print_r($exif);
              } else {
                echo "file not moved";
              }
          }

        }

        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist();
        // $entityManager->flush();


        return $this->render('home/index.html.twig');
    }
      return $this->render('files/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }

    /**
      *@Route("/info", name="info")
      *
    */
    public function info()
    {
      //
      return $this->render('info/index.html.twig');
    }

    /**
     * @Route("/article/edit/{id}", name="edit_article")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $files = new Files();
      $files = $this->getDoctrine()->getRepository(Files::class)->find($id);

      $form = $this->createFormBuilder($files)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('body', TextareaType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('info_list');
      }

      return $this->render('articles/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

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
