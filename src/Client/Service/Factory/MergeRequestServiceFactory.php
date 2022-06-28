<?php

namespace Client\Service\Factory;

use Psr\Container\ContainerInterface;
use Sdlc\DataSource\GitLab\Factory\GitLabClientFactory;
use Sdlc\DataSource\GitLab\Service\MergeRequestService;

class MergeRequestServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $mergeRequestService = new MergeRequestService();
        $mergeRequestService->setClient($container[GitLabClientFactory::class]);
        $container[MergeRequestService::class] = $mergeRequestService;
    }
}