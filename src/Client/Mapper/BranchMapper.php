<?php

namespace Client\Mapper;

use Client\Dto\Branch;

class BranchMapper
{
    public static function map(\stdClass $response) : Branch
    {
        $branch = new Branch();
        $branch->setBranchName($response->name);
        $branch->setWebUrl($response->web_url);
        return $branch;
    }
}
