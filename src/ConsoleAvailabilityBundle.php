<?php

namespace EmagTechLabs\ConsoleAvailabilityBundle;

use EmagTechLabs\ConsoleAvailabilityBundle\DependencyInjection\Compiler\CompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ConsoleAvailabilityBundle
 * @package EmagTechLabs\ConsoleAvailabilityBundle
 */
class ConsoleAvailabilityBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CompilerPass());
    }
}