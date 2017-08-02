<?php

namespace JPFichePaieBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompagnyControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compagny/');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compagny/new');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compagny/show');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compagny/{id}/edit');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compagny/{id}/delete');
    }

}
