<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;

  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\DateType;

  class HomeController extends AbstractController
  {
    /**
      *@Route("/home")
      *
    */
    public function new(Request $request)
    {
      // createfrombuilder gets form factory
      $form = $this->createFormBuilder()
          ->add('task', TextType::class)
          ->add('dueDate', DateType::class)
          ->getForm();

      return $this->render('home/index.html.twig', [
          'form' => $form->createView(),
      ]);
    }
  }

?>
