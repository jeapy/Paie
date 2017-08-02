<?php

namespace JPFichePaieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InfoUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomPrenom', TextType::class,array(
                    'required' => false,
                    'empty_data'  => ''))

                ->add('adresse', TextareaType::class,array(
                    'required' => false,
                    'empty_data'  => '',))

                ->add('numSecur', TextType::class,array(
                    'required' => false,
                    'empty_data'  => '',))

                ->add('dateEnt', DateType::class,array(
                        'required' => false, // render as a single text box
                        'widget' => 'single_text',                        
                        'html5' => false,))

                ->add('matricule', TextType::class,array(
                    'required' => false,
                    'empty_data'  => ''))

                ->add('emploi', EntityType::class, array(
                      'class'        => 'JPAdminBundle:EmploiSalary',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => '',
                    ))  

                ->add('status', EntityType::class, array(
                      'class'        => 'JPAdminBundle:StatusSalary',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => '',
                    )) 

                ->add('position', EntityType::class, array(
                      'class'        => 'JPAdminBundle:PositionSalary',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => ''
                    ))  
                
                ->add('compagny', EntityType::class, array(
                      'class'        => 'JPFichePaieBundle:Compagny',
                      'choice_label' => 'name',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => '',
                    ))          ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JPFichePaieBundle\Entity\InfoUser'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jpfichepaiebundle_infouser';
    }


}
