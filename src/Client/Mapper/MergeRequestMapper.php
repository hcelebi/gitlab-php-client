<?php

namespace Client\Mapper;

use Client\MergeRequest;

class MergeRequestMapper
{
    public static function map(\stdClass $mergeRequestData) : MergeRequest
    {
        $mergeRequest = new MergeRequest();
        $mergeRequest->setId($mergeRequestData->id);
        $mergeRequest->setTitle($mergeRequestData->title);
        $mergeRequest->setSourceBranch($mergeRequestData->source_branch);
        $mergeRequest->setTargetBranch($mergeRequestData->target_branch);
        if (isset($mergeRequestData->status)) {
            $mergeRequest->setStatus($mergeRequestData->status);
        }
        $mergeRequest->setUrl($mergeRequestData->web_url);
        return $mergeRequest;
    }
}