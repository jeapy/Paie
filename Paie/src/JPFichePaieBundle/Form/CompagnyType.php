<?php

namespace JPFichePaieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CompagnyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',         TextType::class,array('required' => true))
                ->add('address',     TextareaType::class,array('required' => true))
                ->add('contact',     TextType::class,array('required' => true))
                ->add('mail',        EmailType::class,array('required' => true))
                ->add('siret',      IntegerType::class,array('required' => true))
                ->add('urssaf',     TextType::class,array('required' => true))
                ->add('naf',        TextType::class,array('required' => true))
                ->add('effectif',   IntegerType::class,array('required' => true))
                
                ->add('convention',EntityType::class, array(
                      'class'        => 'JPFichePaieBundle:Convention',
                      'choice_label' => 'libelle',
                      'multiple'     => false,
                      'required' => true,
                      'placeholder' => 'Choose an option',
                    ))  
                         ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JPFichePaieBundle\Entity\Compagny'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jpfichepaiebundle_compagny';
    }


}
