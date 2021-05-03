<?php


namespace App\Tests\App\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser() {
        $login = new SecurityControllerTest();
        $client = $login->testSuccessLogin();
        $crawler = $client->request('GET', '/users/create');
        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'test';
        $form['user[password][first]'] = 'test';
        $form['user[password][second]'] = 'test';
        $form['user[email]'] = 'test@gmail.com';
        $form['user[role]'] = 'ROLE_USER';
        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }

    public function testEditUser() {
        $client = $this->testCreateUser();
        $crawler = $client->request('GET', '/users/2/edit');
        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'test edit';
        $form['user[password][first]'] = 'testedit';
        $form['user[password][second]'] = 'testedit';
        $form['user[email]'] = 'testedit@gmail.com';
        $form['user[role]'] = 'ROLE_USER';
        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('.alert-success')->count());

        return $client;
    }
}
