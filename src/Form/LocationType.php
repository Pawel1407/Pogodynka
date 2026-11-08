<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Country', ChoiceType::class, [
                'choices' => [
                    'placeholder' => 'Select country',
                    'Poland' => 'PL',
                    'Germany' => 'GE',
                    'France' => 'FR',
                    'Spain' => 'ES',
                    'Italy' => 'IT',
                    'United Kingdom' => 'GB',
                    'United States' => 'US',
                ]
            ])
            ->add('Name', null, [
                'attr' => [
                    'placeholder' => 'Enter city name',
                ]
            ])
            ->add('Longtitude', NumberType::class, [
                'label' => 'Longitude',
                'attr' => [
                    'placeholder' => 'Enter longitude',
                    'min' => -90,
                    'max' => 90,
                    'step' => 'any',
                ]
            ])
            ->add('Latitude', NumberType::class, [
                'label' => 'Latitude',
                'attr' => [
                    'placeholder' => 'Enter latitude',
                    'min' => -90,
                    'max' => 90,
                    'step' => 'any',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
