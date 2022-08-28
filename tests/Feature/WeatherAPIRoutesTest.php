<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;



class WeatherAPIRoutesTest extends TestCase
{
   
    public function test_current_weather_by_postcode()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $response = $this->get('/api/current/pe134hd');
        
        $response->assertStatus(200);
    }

    public function test_default_weather_forecast_by_postcode()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $response = $this->get('/api/forecast/pe134hd');
        
        $response->assertStatus(200);
    }

    public function test_daily_weather_forecast_by_postcode()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $response = $this->get('/api/forecast/pe134hd/daily');
        
        $response->assertStatus(200);
    }

    public function test_hourly_weather_forecast_by_postcode()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $response = $this->get('/api/forecast/pe134hd/hourly');
        
        $response->assertStatus(200);
    }
}
