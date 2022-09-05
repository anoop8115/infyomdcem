<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMeterDataAPIRequest;
use App\Http\Requests\API\UpdateMeterDataAPIRequest;
use APP\Http\Requests\API\CreateRoDataRequest;
use App\Models\MeterData;
use App\Repositories\MeterDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
// carbon
use Carbon\Carbon;
/**
 * Class MeterDataController
 * @package App\Http\Controllers\API
 */

class MeterDataAPIController extends AppBaseController
{
    /** @var  MeterDataRepository */
    private $meterDataRepository;

    public function __construct(MeterDataRepository $meterDataRepo)
    {
        $this->meterDataRepository = $meterDataRepo;
    }

    /**
     * Display a listing of the MeterData.
     * GET|HEAD /meterDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $meterDatas = $this->meterDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($meterDatas->toArray(), 'Meter Datas retrieved successfully');
    }



     public function api_store(CreateMeterDataAPIRequest $request){
        $input = $request->all();
              
              if(@$input['device_id'])
              {
                  $device_id = $input['device_id'];
                  $check = DB::table('meterdatas')->where('device_id',$device_id)->first();
                   $info = DB::table('deviceinfo')->where('device_id',$device_id)->get();
                   if(@$info[0])
                   {
                       $input['sap_id']= $info[0]->sap_id;
                   }
                   if($check != null)
                  {
                                 $pre_logs = DB::table('ro_data_logs')->where('device_id',$check->device_id)->orderby('id','DESC')->get()[0];
                       
                         if($pre_logs != null)
                        {  $start  = new Carbon($check->updated_at);
                         $end    = new Carbon($pre_logs->created_at);
                        $differ =  $start->diff($end)->format('%H:%I:%S');
                        
                     if($differ >= "01:00:00")
                     {
                      
                         DB::table('ro_data_logs')->insert($input);
                     }
                      }
                      else{
                           DB::table('ro_data_logs')->insert($input);
                      }
                      $input['updated_at'] =Carbon::now()->toDateTimeString();
                      DB::table('meterdatas')->where('device_id',$device_id)->update($input);
                      
                      return response()->json(['success'=>true,'message'=>'Ro Data updated successfully.']);
                    
                  }
                  else
                  {
                        $input['updated_at'] =Carbon::now()->toDateTimeString();
                       $roData = $this->roDataRepository->create($input);
                        DB::table('meterdatas')->insert($input);
                        return response()->json(['success'=>true,'message'=>'Ro Data saved successfully.']); 
                  }
                  
                  
              }
              else
             return response()->json(['success'=>false,'message'=>'Device id is required.']);  
      
    }



    /**
     * Store a newly created MeterData in storage.
     * POST /meterDatas
     *
     * @param CreateMeterDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMeterDataAPIRequest $request)
    {
        $input = $request->all();

        $meterData = $this->meterDataRepository->create($input);

        return $this->sendResponse($meterData->toArray(), 'Meter Data saved successfully');
    }

    /**
     * Display the specified MeterData.
     * GET|HEAD /meterDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MeterData $meterData */
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            return $this->sendError('Meter Data not found');
        }

        return $this->sendResponse($meterData->toArray(), 'Meter Data retrieved successfully');
    }

    /**
     * Update the specified MeterData in storage.
     * PUT/PATCH /meterDatas/{id}
     *
     * @param int $id
     * @param UpdateMeterDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeterDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var MeterData $meterData */
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            return $this->sendError('Meter Data not found');
        }

        $meterData = $this->meterDataRepository->update($input, $id);

        return $this->sendResponse($meterData->toArray(), 'MeterData updated successfully');
    }

    /**
     * Remove the specified MeterData from storage.
     * DELETE /meterDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MeterData $meterData */
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            return $this->sendError('Meter Data not found');
        }

        $meterData->delete();

        return $this->sendSuccess('Meter Data deleted successfully');
    }
}
