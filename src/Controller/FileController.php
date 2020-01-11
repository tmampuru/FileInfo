<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;

  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

  class FileController extends AbstractController
  {
    /**
      *@Route("/")
      *
    */
    public function new(Request $request)
    {
      // createfrombuilder gets form factory
      $form = $this->createFormBuilder()
          ->add('files', FileType::class)
          ->add('upload', SubmitType::class, array(
            'label' => 'Upload',
            'attr' => array('class' => 'upload')
          ))
          ->getForm();

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {
              $data = $form->getData();

               $entityManager = $this->getDoctrine()->getManager();
               $entityManager->persist($data);
               $entityManager->flush();

              // ... perform some action, such as saving the data to the database

            return $this->redirectToRoute('task_success');
        }

      return $this->render('files/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }
  }

?>
