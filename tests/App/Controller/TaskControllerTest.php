<?php


namespace App\Tests\App\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class TaskControllerTest extends WebTestCase
{
    public function testCreateTask()
    {
        $login = new SecurityControllerTest();
        $client = $login->testSuccessLogin();
        $crawler = $client->request('GET', '/tasks/create');
        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'title';
        $form['task[content]'] = 'content';
        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }

    public function testEditTask()
    {
        $client = $this->testCreateTask();
        $crawler = $client->request('GET', '/tasks/1/edit');
        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'title edit';
        $form['task[content]'] = 'content edit';
        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }

    public function testToggleTask()
    {
        $client = $this->testCreateTask();
        $client->request('GET', '/tasks/1/toggle');
        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }

    public function testDeleteTask()
    {
        $client = $this->testCreateTask();
        $client->request('GET', '/tasks/1/delete');
        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }
}
