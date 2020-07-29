<?php

namespace EmagTechLabs\ConsoleAvailabilityBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class CompilerPass
 * @package EmagTechLabs\ConsoleAvailabilityBundle\DependencyInjection\Compiler
 */
class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $env = $container->getParameter('kernel.environment');

        $services = $container->findTaggedServiceIds('console.command.availability');
        foreach ($services as $id => $tags) {
            $definition = $container->getDefinition($id);
            foreach ($tags as $tag) {
                if (isset($tag['env']) && $tag['env'] !== $env) {
                    $definition->clearTag('console.command');
                }
            }
        }
    }
}
