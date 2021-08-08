<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Post as PostEntity;
use App\Repository\PostRepository;

class PostService
{
    private const DEFAULT_RELATED_FIELD = 'category';

    /**
     * Post constructor.
     * @param PostRepository $repository
     */
    public function __construct(
        private PostRepository $repository
    ) {}

    /**
     * @param PostEntity $post
     * @return array
     */
    public function getRelated(PostEntity $post): array
    {
        return $this->repository->getRelatedByField($post, static::DEFAULT_RELATED_FIELD);
    }
}
