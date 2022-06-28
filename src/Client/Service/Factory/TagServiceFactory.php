<?php

namespace Client\Service\Factory;

use Psr\Container\ContainerInterface;
use Sdlc\DataSource\GitLab\Factory\GitLabClientFactory;
use Sdlc\DataSource\GitLab\Service\TagService;

class TagServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $tagService = new TagService();
        $tagService->setClient($container[GitLabClientFactory::class]);
        $container[TagService::class] = $tagService;
    }
}