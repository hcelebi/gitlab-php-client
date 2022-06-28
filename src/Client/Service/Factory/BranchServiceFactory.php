<?php

namespace Client\Service\Factory;

use Psr\Container\ContainerInterface;
use Sdlc\DataSource\GitLab\Factory\GitLabClientFactory;
use Sdlc\DataSource\GitLab\Service\BranchService;

class BranchServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $branchService = new BranchService();
        $branchService->setClient($container[GitLabClientFactory::class]);
        $container[BranchService::class] = $branchService;
    }
}