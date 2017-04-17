<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

final class HomePageActionFactory
{
    public function __invoke(ContainerInterface $container): HomePageAction
    {
        return new HomePageAction(
            $container->get('pdo.connection')
        );
    }
}
