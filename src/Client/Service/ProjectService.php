<?php

namespace Client\GitLab\Service;

use GuzzleHttp\Client;
use Client\Mapper\ProjectMapper;

class ProjectService extends AbstractGitLabService
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

    public function searchProject(string $name) {
        try {
            $response = $this->client->request('GET', 'projects/?search=' . $name . '&private_token=' . static::TOKEN);
            $response = json_decode($response->getBody()->getContents());
            return ProjectMapper::mapList($response);
        }catch (\Exception $exception){
            return [];
        }
    }
}