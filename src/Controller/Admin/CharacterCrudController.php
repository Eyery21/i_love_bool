<?php

namespace App\Controller\Admin;

use App\Entity\Character;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;


class CharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Character::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('realName', 'Nom Réel'),
            TextField::new('alias', 'Alias')->hideOnIndex(),
            TextField::new('alignment', 'Alignement')->hideOnIndex(),
            TextField::new('espece', 'Espèce')->hideOnIndex(),
            TextField::new('baseOfOperations', 'Base d’Opérations')->hideOnIndex(),
            TextField::new('nemesys', 'Némésis')->hideOnIndex(),
            TextField::new('occupation', 'Occupation')->hideOnIndex(),
            ArrayField::new('affiliations', 'Affiliations')->hideOnIndex(),
            TextEditorField::new('originStory', 'Histoire d’Origine')->hideOnIndex(),
            ArrayField::new('power', 'Pouvoirs')->hideOnIndex(),
            ArrayField::new('equipement', 'Équipements')->hideOnIndex(),
        ];
    }
    
}
