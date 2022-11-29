<?php

namespace App\Controller\Admin;

use App\Entity\Manif;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ManifCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manif::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            TextEditorField::new('description'),
            ImageField::new('affiche')->setBasePath('images/')->setUploadDir('public/assets/images/'),
            AssociationField::new('derouler')
        ];
    }

}
