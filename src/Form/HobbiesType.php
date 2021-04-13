<?php

namespace App\Form;

use App\Entity\Hobbies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HobbiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
            ->add(
                'icon',
                ChoiceType::class,
                [
                    'placeholder' => 'Choisis ton icone',
                    'choices' => [
                        '📖' => '📖
                        ',
                        '🎼' => '🎼',
                        '🏃🏼‍♀️' => '🏃🏼‍♀️',
                        '🚴‍♀️' => '🚴‍♀️',
                        '🛹' => '🛹',
                        'L⛳️' => '⛳️',
                        '⚽️' => '⚽️',
                        '🎮' => '🎮',
                        '🎬' => '🎬',
                        '🏝' => '🏝',
                        '🧗‍♀️' => '🧗‍♀️',

                    ],
                ]
            )
            ->add('hobbyName')
=======
            ->add('hobbyName')
            ->add('icon', ChoiceType::class, [
                'placeholder' => 'Choisis une icone',
                'choices'  => [
                    '📖' => '📖',
                    '🎼' => '🎼',
                    '🎬' => '🎬',
                    '🎮' => '🎮',
                    '🧳' => '🧳',
                    '🏃‍♂️' => '🏃‍♂️',
                    '🧗‍♀️' => '🧗‍♀️',
                    '🛹' => '🛹',
                    '🚵‍♀️' =>  '🚵‍♀️',
                    '⚽️' =>  '⚽️',
                    '🎾' =>  '🎾',
                ],
            ]
            
            )
>>>>>>> 8edb56c051ad7c52704704ebf4ea293beb1507e9
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hobbies::class,
        ]);
    }
}
