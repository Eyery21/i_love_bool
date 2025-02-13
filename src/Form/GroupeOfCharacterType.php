<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\GroupeOfCharacter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupeOfCharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('fonded_at', null, [
                'widget' => 'single_text',
            ])
            ->add('image')
            ->add('alignment')
            ->add('headquarters')
            ->add('created_at', null, [
                'widget' => 'single_text',
            ])
            ->add('updated_at', null, [
                'widget' => 'single_text',
            ])
            ->add('members', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('rival_groups', EntityType::class, [
                'class' => GroupeOfCharacter::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('groupeOfCharacters', EntityType::class, [
                'class' => GroupeOfCharacter::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GroupeOfCharacter::class,
        ]);
    }
}
