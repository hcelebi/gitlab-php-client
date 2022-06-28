<?php
namespace Client\Factory;

use Psr\Container\ContainerInterface;
use Client\Factory\GitLabClientFactory;
use Client\Service\ProjectService;

class ProjectServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $projectService = new ProjectService();
        $projectService->setClient($container[GitLabClientFactory::class]);
        $container[ProjectService::class] = $projectService;
    }
}