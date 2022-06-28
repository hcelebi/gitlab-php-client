<?php

namespace Client\Service;

use GuzzleHttp\Client;
use Client\Dto\Branch;
use Client\Dto\NewBranchRequest;
use Client\Mapper\BranchMapper;

class BranchService extends AbstractGitLabService
{

    /** @var Client */
    private $client;

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getBranch(int $projectId, string $branchName) : ?Branch
    {
        try {
            $response = $this->client->request('GET', 'projects/' . $projectId . '/repository/branches/' . urlencode($branchName). '?private_token=' . static::TOKEN);
            $response = json_decode($response->getBody()->getContents());
            if (isset($response->name)) {
                return BranchMapper::map($response);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function createBranch(int $projectId, NewBranchRequest $branch) : void
    {
        try {
            $this->client->request('POST', 'projects/' . $projectId . '/repository/branches?private_token=' . static::TOKEN, ['body' => $branch->toJson()]);
        } catch (\Exception $exception){
        }
    }
}