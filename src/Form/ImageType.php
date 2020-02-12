<?php
  namespace App\Form;

  use App\Entity\Files;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Validator\Constraints\File;

class ImageType extends AbstractType
  {
      /**
       * @param FormBuilderInterface $builder
       * @param array $options
       */
       public function buildForm(FormBuilderInterface $builder, array $options)
       {
           $builder
           ->add('images', FileType::class, [
                 'multiple' => true,
                 'attr'     => [
                     'accept' => 'image/*',
                     'multiple' => 'multiple'
                   ]
                 ])
           ->add('upload', SubmitType::class, array(
             'label' => 'Upload',
             'attr' => array('class' => 'upload')
           ))
           ;
       }

      public function configureOptions(OptionsResolver $resolver)
      {
          $resolver->setDefaults([
              'data_class' => Files::class,
          ]);
      }
  }

 ?>
