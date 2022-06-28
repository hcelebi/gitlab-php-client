<?php

namespace Client\Mapper;

use Client\Dto\Tag;

class TagMapper
{
    public static function map(\stdClass $response) : Tag
    {
        $tag = new Tag();
        $tag->setName($response->name);
        $tag->setMessage($response->commit->title);
        return $tag;
    }
}