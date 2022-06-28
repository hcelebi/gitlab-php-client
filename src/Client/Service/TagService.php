<?php

namespace Client\Service;

use GuzzleHttp\Client;
use Client\Dto\Tag;
use Client\Mapper\TagMapper;

class TagService extends AbstractGitLabService
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

    public function getTag(string $tagName, int $projectId): ?Tag {
        try {
            $response = $this->client->request('GET', 'projects/' . $projectId . '/repository/tags/' . urlencode($tagName). '?private_token=' . static::TOKEN);
            $response = json_decode($response->getBody()->getContents());
            if (isset($response->name)) {
                return TagMapper::map($response);
            } else {
                return null;
            }
        }catch (\Exception $exception){
            return null;
        }
    }
}