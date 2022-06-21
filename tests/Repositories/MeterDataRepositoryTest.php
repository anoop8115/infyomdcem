<?php namespace Tests\Repositories;

use App\Models\MeterData;
use App\Repositories\MeterDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MeterDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MeterDataRepository
     */
    protected $meterDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->meterDataRepo = \App::make(MeterDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_meter_data()
    {
        $meterData = MeterData::factory()->make()->toArray();

        $createdMeterData = $this->meterDataRepo->create($meterData);

        $createdMeterData = $createdMeterData->toArray();
        $this->assertArrayHasKey('id', $createdMeterData);
        $this->assertNotNull($createdMeterData['id'], 'Created MeterData must have id specified');
        $this->assertNotNull(MeterData::find($createdMeterData['id']), 'MeterData with given id must be in DB');
        $this->assertModelData($meterData, $createdMeterData);
    }

    /**
     * @test read
     */
    public function test_read_meter_data()
    {
        $meterData = MeterData::factory()->create();

        $dbMeterData = $this->meterDataRepo->find($meterData->id);

        $dbMeterData = $dbMeterData->toArray();
        $this->assertModelData($meterData->toArray(), $dbMeterData);
    }

    /**
     * @test update
     */
    public function test_update_meter_data()
    {
        $meterData = MeterData::factory()->create();
        $fakeMeterData = MeterData::factory()->make()->toArray();

        $updatedMeterData = $this->meterDataRepo->update($fakeMeterData, $meterData->id);

        $this->assertModelData($fakeMeterData, $updatedMeterData->toArray());
        $dbMeterData = $this->meterDataRepo->find($meterData->id);
        $this->assertModelData($fakeMeterData, $dbMeterData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_meter_data()
    {
        $meterData = MeterData::factory()->create();

        $resp = $this->meterDataRepo->delete($meterData->id);

        $this->assertTrue($resp);
        $this->assertNull(MeterData::find($meterData->id), 'MeterData should not exist in DB');
    }
}
