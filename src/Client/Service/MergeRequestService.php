<?php

namespace Client\Service;

use Client\Dto\MergeRequest;
use Client\Mapper\MergeRequestMapper;

class MergeRequestService extends AbstractGitLabService
{
    private $client;

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }



    public function getMergeRequest(int $projectId, string $sourceBranchName, string $targetBranchName) : ?MergeRequest
    {
        try {
            $response = $this->client->request('GET', 'projects/' . $projectId . '/merge_requests?private_token=' . static::TOKEN . '&source_branch=' . urlencode($sourceBranchName). '&target_branch=' . urlencode($targetBranchName));
            $response = json_decode($response->getBody()->getContents());
            if ($response != null && count($response) > 0 && isset($response[0])) {
                return MergeRequestMapper::map($response[0]);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function createMergeRequest(int $mergeAbleRepository, string $sourceBranch, string $targetBranch) : ?MergeRequest
    {
        try {
            $mergeRequest = new MergeRequest();
            $mergeRequest->setSourceBranch($sourceBranch);
            $mergeRequest->setTargetBranch($targetBranch);
            $mergeRequest->setTitle('SDLC Automated MR: '. $sourceBranch . ' -> ' . $targetBranch);
            $mergeRequest->setRemoveSourceBranch(true);
            $response = $this->client->request('POST', 'projects/' . $mergeAbleRepository . '/merge_requests?private_token=' . static::TOKEN, ['body' => $mergeRequest->toJson()]);
            $response = json_decode($response->getBody()->getContents())[0];
            if ($response != null && isset($response->id)) {
                return MergeRequestMapper::map($response);
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
}
