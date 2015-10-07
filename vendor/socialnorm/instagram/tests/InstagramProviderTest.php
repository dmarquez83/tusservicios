<?php

use Mockery as M;
use SocialNorm\Instagram\InstagramProvider;
use SocialNorm\Request;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Subscriber\Mock as SubscriberMock;

class InstagramProviderTest extends TestCase
{
    private function getStubbedHttpClient($responses = [])
    {
        $client = new HttpClient;
        $mockSubscriber = new SubscriberMock($responses);
        $client->getEmitter()->attach($mockSubscriber);
        return $client;
    }

    /** @test */
    public function it_can_retrieve_a_normalized_user()
    {
        $client = $this->getStubbedHttpClient([
            __DIR__ . '/_fixtures/instagram_accesstoken.txt',
            __DIR__ . '/_fixtures/instagram_user.txt',
        ]);

        $provider = new InstagramProvider([
            'client_id' => 'abcdefgh',
            'client_secret' => '12345678',
            'redirect_uri' => 'http://example.com/login',
        ], $client, new Request(['code' => 'abc123']));

        $user = $provider->getUser();

        $this->assertEquals('755628434', $user->id);
        $this->assertEquals('johndoe', $user->nickname);
        $this->assertEquals('John Doe', $user->full_name);
        $this->assertNull($user->email);
        $this->assertEquals('https://instagramimages-a.akamaihd.net/profiles/anonymousUser.jpg', $user->avatar);
        $this->assertEquals('755628434.581af4b.94a8666dd0184cc3b4cbfa7199882d11', $user->access_token);
    }

    /**
     * @test
     * @expectedException SocialNorm\Exceptions\ApplicationRejectedException
     */
    public function it_fails_to_retrieve_a_user_when_the_authorization_code_is_omitted()
    {
        $client = $this->getStubbedHttpClient([
            __DIR__ . '/_fixtures/instagram_accesstoken.txt',
            __DIR__ . '/_fixtures/instagram_user.txt',
        ]);

        $provider = new InstagramProvider([
            'client_id' => 'abcdefgh',
            'client_secret' => '12345678',
            'redirect_uri' => 'http://example.com/login',
        ], $client, new Request([]));

        $user = $provider->getUser();
    }
}
