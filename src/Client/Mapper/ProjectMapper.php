<?php

namespace Client\Mapper;

use Client\Project;

class ProjectMapper
{
    /**
     * @param array $response
     * @return Project[]
     */
    public static function mapList(array $response) : array {
        $projects = [];
        foreach ($response as $item) {
            $projects[] = static::map($item);
        }
        return $projects;
    }
    
    public static function map(\stdClass $response) : Project
    {
        $project = new Project();
        $project->setId($response->id);
        $project->setName($response->name);
        return $project;
    }
}