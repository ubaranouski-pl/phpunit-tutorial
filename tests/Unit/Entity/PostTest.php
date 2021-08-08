<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Post;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Entity\Post
 */
class PostTest extends TestCase
{
    /**
     * @covers ::getId
     * @covers ::setId
     * @return Post
     * @throws \Exception
     */
    public function testGetSetId(): Post
    {
        $testedInstance = new Post();
        $id = random_int(0, 9);
        $testedInstance->setId($id);
        $result = $testedInstance->getId();
        $this->assertEquals($id, $result);
        return $testedInstance;
    }

    /**
     * @covers ::getTitle
     * @covers ::setTitle
     * @depends testGetSetId
     * @param Post $testedInstance
     * @return Post
     */
    public function testGetSetTitle(Post $testedInstance): Post
    {
        $title = uniqid('title', false);
        $testedInstance->setTitle($title);
        $result = $testedInstance->getTitle();
        $this->assertEquals($title, $result);
        return $testedInstance;
    }

    /**
     * @covers ::getContent
     * @covers ::setContent
     * @depends testGetSetTitle
     * @param Post $testedInstance
     * @return Post
     */
    public function testGetSetContent(Post $testedInstance): Post
    {
        $content = uniqid('content', false);
        $testedInstance->setContent($content);
        $result = $testedInstance->getContent();
        $this->assertEquals($content, $result);
        return $testedInstance;
    }

    /**
     * @covers ::getCategory
     * @covers ::setCategory
     * @depends testGetSetContent
     * @param Post $testedInstance
     * @return Post
     */
    public function testGetSetCategory(Post $testedInstance): Post
    {
        $category = uniqid('category', false);
        $testedInstance->setCategory($category);
        $result = $testedInstance->getCategory();
        $this->assertEquals($category, $result);
        return $testedInstance;
    }
}
