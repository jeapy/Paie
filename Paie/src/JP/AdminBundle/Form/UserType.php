<?php

namespace JP\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $permissions = array(
        'ROLE_USER'        => 'Utilisateur',
        'ROLE_ADMIN'       => 'Administrateur'
    );

    $builder

     ->add('role', ChoiceType::class, array(
                    'choices' => $permissions,
                      'required'    => false,
                      'placeholder' => 'Choisir le role',
                      
                  ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JPFichePaieBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_adminbundle_user';
    }



}
