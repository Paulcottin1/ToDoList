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
    }
}
