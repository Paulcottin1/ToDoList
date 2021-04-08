<?php


namespace App\Tests\App\Entity;


use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testEntity() {
        $user = new User();
        $task = new Task();

        $task->setTitle('title')
            ->setContent('content')
            ->setUser($user)
            ->setCreatedAt(new \DateTime());

        $this->assertNotNull($task->getTitle());
        $this->assertNotNull($task->getContent());
        $this->assertNotNull($task->getUser());
        $this->assertNotNull($task->getCreatedAt());

        return $task;
    }
}
