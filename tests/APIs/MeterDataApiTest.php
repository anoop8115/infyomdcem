<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MeterData;

class MeterDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_meter_data()
    {
        $meterData = MeterData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/meter_datas', $meterData
        );

        $this->assertApiResponse($meterData);
    }

    /**
     * @test
     */
    public function test_read_meter_data()
    {
        $meterData = MeterData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/meter_datas/'.$meterData->id
        );

        $this->assertApiResponse($meterData->toArray());
    }

    /**
     * @test
     */
    public function test_update_meter_data()
    {
        $meterData = MeterData::factory()->create();
        $editedMeterData = MeterData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/meter_datas/'.$meterData->id,
            $editedMeterData
        );

        $this->assertApiResponse($editedMeterData);
    }

    /**
     * @test
     */
    public function test_delete_meter_data()
    {
        $meterData = MeterData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/meter_datas/'.$meterData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/meter_datas/'.$meterData->id
        );

        $this->response->assertStatus(404);
    }
}
