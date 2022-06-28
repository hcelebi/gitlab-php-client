<?php

namespace Client\Service\Factory;

use Psr\Container\ContainerInterface;
use Client\Factory\GitLabClientFactory;
use Client\Service\MergeRequestService;

class MergeRequestServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $mergeRequestService = new MergeRequestService();
        $mergeRequestService->setClient($container[GitLabClientFactory::class]);
        $container[MergeRequestService::class] = $mergeRequestService;
    }
}