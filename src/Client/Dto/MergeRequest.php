<?php

namespace Client\Dto;

class MergeRequest
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $sourceBranch;
    /** @var string */
    private $targetBranch;
    /** @var null|string */
    private $status;
    /** @var string */
    private $url;
    /** @var bool */
    private $removeSourceBranch = true;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSourceBranch(): string
    {
        return $this->sourceBranch;
    }

    /**
     * @param string $sourceBranch
     */
    public function setSourceBranch(string $sourceBranch): void
    {
        $this->sourceBranch = $sourceBranch;
    }

    /**
     * @return string
     */
    public function getTargetBranch(): string
    {
        return $this->targetBranch;
    }

    /**
     * @param string $targetBranch
     */
    public function setTargetBranch(string $targetBranch): void
    {
        $this->targetBranch = $targetBranch;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool $removeSourceBranch
     */
    public function getRemoveSourceBranch(): bool
    {
        return $this->removeSourceBranch;
    }

    /**
     * @param bool $removeSourceBranch
     */
    public function setRemoveSourceBranch(bool $removeSourceBranch): void
    {
        $this->removeSourceBranch = $removeSourceBranch;
    }

    

    public function toArray() : array
    {
        return [
            'title' => $this->title,
            'source_branch' => $this->sourceBranch,
            'target_branch' => $this->targetBranch,
            'remove_source_branch' => $this->removeSourceBranch,
        ];
    }

    public function toJson() : string
    {
        return json_encode($this->toArray());
    }
}