Gitlab Api Php Client
===============

Installation
------

The prefered way to install this client 

```
php composer.phar require hcelebi/gitlab-php-client
```
or
```
composer require hcelebi/gitlab-php-client
```


Configuration
----
Dependency injection is exist in project, add these factories to configuration.
```
GitLabClientFactory.php
BranchServiceFactory.php
```

Dependency injection doesn't exist in project, add this code block to application entry point
```
$container = new Container();
GitLabClientFactory::createService($container);
BranchServiceFactory::createService($container);
```

Usage
----
Get master branch from specific gitlab project
```
/** @var BranchService $branchService */
$branchService = $container->get(BranchService::class);

$projectId = 37129493;
$branch = $branchService->getBranch(37129493, "master");
```