<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, [
                'required' => true,
                'constraints' => [new Length(['min' => 2, 'max' => 20])],
                'help' => 'First name is required'
            ])
            ->add('lastName', null, [
                'required' => true,
                'constraints' => [new Length(['min' => 2, 'max' => 20])],
                'help' => 'Last name is required'
            ])
            ->add('course')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
