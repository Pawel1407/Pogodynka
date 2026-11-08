<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class)
            ->add('temperature', IntegerType::class,[
                'required' => true,
                'invalid_message' => 'Temperature must be a valid integer.',
                'invalid_message_parameters' => [],
            ])
            ->add('percipation',IntegerType::class)
            ->add('pressure', IntegerType::class)
            ->add('wind_speed', IntegerType::class)
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'Name',
                'placeholder' => 'Select city',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
