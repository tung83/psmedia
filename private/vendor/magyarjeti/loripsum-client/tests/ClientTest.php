<?php

use Magyarjeti\Loripsum\Client;
use Mockery as m;

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testCallUnknownParameter()
    {
        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');

        $client = new Client($conn);
        $client->foo();
    }

    public function testFluentInterface()
    {
        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');

        $client = new Client($conn);

        $this->assertSame($client, $client->headers());
    }

    public function testCallWithoutParameters()
    {
        $uri = '';

        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');
        $conn->shouldReceive('request')
            ->once()
            ->with(m::on(function ($url) use (&$uri) {
                $uri = $url;
                return true;
            }));

        $client = new Client($conn);
        $client->html();

        $this->assertEquals(Client::API_URL, $uri);
    }

    public function testCallWithParameter()
    {
        $uri = '';

        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');
        $conn->shouldReceive('request')
            ->once()
            ->with(m::on(function ($url) use (&$uri) {
                $uri = $url;
                return true;
            }));

        $client = new Client($conn);
        $client->headers();
        $client->html();

        $this->assertRegExp('/headers/', $uri);
    }

    public function testDefaultNumberOfParagraphs()
    {
        $uri = '';

        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');
        $conn->shouldReceive('request')
            ->once()
            ->with(m::on(function ($url) use (&$uri) {
                $uri = $url;
                return true;
            }));

        $client = new Client($conn);
        $client->html();

        $this->assertRegExp('/^[^\d]+$/', $uri);
    }

    public function testCustomNumberOfParagraphs()
    {
        $uri = '';

        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');
        $conn->shouldReceive('request')
            ->once()
            ->with(m::on(function ($url) use (&$uri) {
                $uri = $url;
                return true;
            }));

        $client = new Client($conn);
        $client->html(5);

        $this->assertRegExp('/\d/', $uri);
    }

    public function testMultipleUseOfSameParameter()
    {
        $uri = '';

        $conn = m::mock('Magyarjeti\Loripsum\Http\CurlAdapter');
        $conn->shouldReceive('request')
            ->once()
            ->with(m::on(function ($url) use (&$uri) {
                $uri = $url;
                return true;
            }));

        $client = new Client($conn);
        $client->headers();
        $client->headers();
        $client->headers();
        $client->html();

        $this->assertEquals(1, substr_count($uri, 'headers'));
    }
}
