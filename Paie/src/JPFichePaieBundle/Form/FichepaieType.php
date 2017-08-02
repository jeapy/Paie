<?php

namespace JPFichePaieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\Form\Extension\Core\Type\HiddenType;
   use Symfony\Component\Form\Extension\Core\Type\DateType;
      use Symfony\Component\Form\Extension\Core\Type\TextType;
// ...
use JPFichePaieBundle\Form\InfoUserType;

class FichepaieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('realise', HiddenType::class, array(
                                'data' => '0',
                            ))
                
                
                ->add('infouser', InfoUserType::class)

                ->add('datedu', DateType::class,array(
                        // render as a single text box
                        'widget' => 'single_text',                        
                        'html5' => false,
                        'required' => false,
                        
                    ))
                ->add('dateau',DateType::class, array(
                        // render as a single text box
                        'widget' => 'single_text',
                        'html5' => false,
                        'required' => false, 
                                          
                        
                    ))
                ->add('datepaie',DateType::class, array(
                        // render as a single text box
                        'widget' => 'single_text',
                        'html5' => false,
                        'required' => false,  
                                                               
                        
                    ))
                ->add('salairebrut',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                      
                    ))
                ->add('heuressup25',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('heuressup10',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('heuressup50',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('tauxtransport',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('tauxaccident',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                
                ->add('typeprime',EntityType::class, array(
                      'class'        => 'JPAdminBundle:PrimeSalary',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => '' 
                    ))
                ->add('valeurprime',TextType::class,array(
                        // render as a single text box
                       'required' => false,  
                       'empty_data'  => ''                       
                    ))
                ->add('typeavantage',EntityType::class, array(
                      'class'        => 'JPAdminBundle:AvantageSalary',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => false,
                      'placeholder' => 'Choose an option',
                      'empty_data'  => '' 
                    ))
                ->add('valeuravantage',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('nombreheuretravail',TextType::class,array(
                        // render as a single text box
                       'required' => false,  
                       'empty_data'  => '',
                       'data'  =>'151,67'                       
                    ))               

                 ->add('couverture', ChoiceType::class, array(
                    'choices' => array(
                          'Oui' => '1',
                          'Non' => '2'
                      ),
                      'required'    => false,
                      'placeholder' => 'Choisir',
                      'empty_data'  => '2'
                  ))

                ->add('modepaie', EntityType::class, array(
                      'class'        => 'JPAdminBundle:ModePaie',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required'     => false,
                      'placeholder' => 'Choisir une option',
                      'empty_data'  => '' 
                    )) 
                ->add('complement',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('chargemployeur',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => '',
                       'data'  => '50'                        
                    ))
                ->add('congepaye',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('arretmaladie',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('abscongsasold',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('congeacquis',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('congepris',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('cumulehr',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('cumule_hrsup',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('cumulebase',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('cumbr',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('cumuleimpaye',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('fraistransport',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))
                ->add('repriseavantage',TextType::class,array(
                        // render as a single text box
                       'required' => false,
                       'empty_data'  => ''                         
                    ))
                ->add('nbrticketresto',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))  
                ->add('ticketresto',TextType::class,array(
                        // render as a single text box
                       'required' => false, 
                       'empty_data'  => ''                        
                    ))  
                
                 
                    ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JPFichePaieBundle\Entity\Fichepaie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jpfichepaiebundle_fichepaie';
    }


}
