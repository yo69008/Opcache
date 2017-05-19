<?php

namespace OpcacheBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OpcacheControllerTest extends WebTestCase
{
    public function testOpcache()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/opcache');
    }

}
