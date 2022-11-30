<?php

namespace App\Form;

use App\Entity\Manif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('date')
            ->add('genre')
            ->add('prix')
            ->add('casting')
            ->add('affiche')
            ->add('description')
            ->add('derouler')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Manif::class,
        ]);
    }
}
