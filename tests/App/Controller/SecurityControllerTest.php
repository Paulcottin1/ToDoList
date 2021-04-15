<?php


namespace App\Tests\App\Controller;


use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    use FixturesTrait;

    public function testSuccessLogin()
    {
        $this->loadFixtureFiles([__DIR__ . '/users.yml']);
        static::ensureKernelShutdown();
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form([
            "_username" => "admin",
            "_password" => "admin",
        ]);
        $client->submit($form);
        $client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Bienvenue sur Todo List' );

        return $client;
    }
}
