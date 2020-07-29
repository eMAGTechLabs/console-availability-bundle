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
    /** @var string */
    private $env;

    public function __construct(string $env)
    {
        $this->env = $env;
    }

    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('console.command.availability');
        foreach ($services as $id => $tags) {
            $definition = $container->getDefinition($id);
            foreach ($tags as $tag) {
                if (isset($tag['env']) && $tag['env'] === $this->env) {
                    $definition->clearTag('console.command');
                }
            }
        }
    }
}
