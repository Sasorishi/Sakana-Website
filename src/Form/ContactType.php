<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, 
                array(
                    'label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Nom', 'style' => 'margin-bottom: 10px')
                )
            )
            ->add('firstname', TextType::class, 
                array(
                    'label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Prénom', 'style' => 'margin-bottom: 10px')
                )
            )
            ->add('phone', TelType::class, 
                array(
                    'label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Téléphone', 'style' => 'margin-bottom: 10px')
                )
            )
            ->add('email', EmailType::class, 
                array(
                    'label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Email', 'style' => 'margin-bottom: 10px')
                )
            )
            ->add('message', TextareaType::class, 
                array(
                    'label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Message', 'style' => 'height:150px;')
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
        //     'data_class' => Contact::class,
        // ]);
    }
}
