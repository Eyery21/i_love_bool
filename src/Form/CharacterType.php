<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Character;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('realName')
            ->add('alias')
            ->add('alignment')
            ->add('espece')
            ->add('baseOfOperations')
            ->add('nemesys')
            ->add('occupation')
            ->add('affiliations')
            ->add('originStory')
            ->add('power')
            ->add('equipement')
            ->add('books', EntityType::class, [
                'class' => Book::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
