<?php

use Client\Factory\GitLabClientFactory;
use Client\Service\BranchService;
use Client\Service\Factory\BranchServiceFactory;
use PHPUnit\Framework\TestCase;
use Slim\Container;

class BranchServiceTest extends TestCase {
    public function testBranchService() {

        $container = new Container();
        GitLabClientFactory::createService($container);
        BranchServiceFactory::createService($container);

        /** @var BranchService $branchService */
        $branchService = $container->get(BranchService::class);

        $branch = $branchService->getBranch(37129493, "master");

        $this->assertEquals("master", $branch->getBranchName());
    }
}