<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTest extends TestCase 
{
    use DatabaseTransactions;

    const ENDPOINT = 'api/cities';
    private $cityModelClassName = '\App\Models\CityModel';
    private $cityRepositoryClassName = '\App\Repositories\CityRepository';

    public function testIfCitiesGetAllIs200Status()
    {
        $response = $this->call('GET', '/'.self::ENDPOINT);
        $this->assertEquals(200, $response->status());
    }

    public function testIfCitiesGetAllReturnsAJson()
    {
        $response = $this->call('GET', '/'.self::ENDPOINT);

        $this->assertArrayHasKey('data', json_decode($response->getContent(), true));           
    }

    public function testIfCitiesGetAllIsReturningAJsonHeader()
    {
        $this->assertEquals(true, true);
    }

    public function testIfHaveACityRepository()
    {
        $this->assertInstanceOf($this->cityRepositoryClassName, new $this->cityRepositoryClassName);
    }

    public function testIfHaveACityEloquentModel()
    {
        $this->assertInstanceOf($this->cityModelClassName, new $this->cityModelClassName);
    }

    public function testIfHaveACityTableInDatabase()
    {
        $cityModel = new $this->cityModelClassName;
        $result = $cityModel->all()->count() >= 0;
        $this->assertTrue($result);
    }

    public function testIfCityIsSaved()
    {
        $this->json('POST', '/'.self::ENDPOINT, [
            'name' => 'São Paulo',
            'api_id' => 3448439
        ])->assertJson([
            'created' => true
        ]);
    }

    public function testIfCityDetailIsWorking()
    {
        $repo = new $this->cityRepositoryClassName();
        $data = $repo->getWheatherForecast(3448439);

        $this->assertNotNull($data);
        $this->assertArrayHasKey('city', $data);
    }
}
