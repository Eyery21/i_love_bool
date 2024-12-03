<?php
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Routing\RouterInterface;

class MainMenuBuilder
{
    private $factory;
    private $router;

    public function __construct(FactoryInterface $factory, RouterInterface $router)
    {
        $this->factory = $factory;
        $this->router = $router;
    }

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Accueil', [
            'route' => 'app_home',
            'label' => 'Accueil',
            'attributes' => [
                'class' => 'menu-item'
            ]
        ]);

        $menu->addChild('Book', [
            'route' => 'app_book_index',
            'label' => 'book', 
            'attributes' => [
                'class' => 'book-item'
            ]

            ]);
        $menu->addChild('Contact', [
            'route' => 'app_contact',
            'label' => 'Contact',
            'attributes' => [
                'class' => 'menu-item'
            ]
        ]);

        // Vous pouvez ajouter d'autres éléments de menu ici si nécessaire

        return $menu;
    }
}