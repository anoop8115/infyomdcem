<?php

namespace App\Http\Controllers;

use App\DataTables\MeterDataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMeterDataRequest;
use App\Http\Requests\UpdateMeterDataRequest;
use App\Repositories\MeterDataRepository;
// model RoDAta
use App\Models\RoData;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Carbon\Carbon;
class MeterDataController extends AppBaseController
{
    /** @var MeterDataRepository $meterDataRepository*/
    private $meterDataRepository;

    public function __construct(MeterDataRepository $meterDataRepo)
    {
        $this->meterDataRepository = $meterDataRepo;
    }

    /**
     * Display a listing of the MeterData.
     *
     * @param MeterDataDataTable $meterDataDataTable
     *
     * @return Response
     */
    public function index(MeterDataDataTable $meterDataDataTable)
    {
        return $meterDataDataTable->render('meter_datas.index');
    }

     public function grid(Request $request)
    {
          $max_data_length = 0;
        if ($request->has('search')) {
            $query = RoData::query();
            // $columns = Schema::getColumnListing('ro_data');
          
                $query->orWhere('device_id', 'LIKE', '%' . $request->search . '%');
        
            $rodata = $query->orderBy('device_id', 'asc')->paginate(2);
        }else{
            $rodata = RoData::orderBy('device_id', 'asc')->paginate(2);
            // dd($rodata);
        };
        $rodata_array = $rodata->toArray()['data'];
     
        foreach ($rodata_array as $data) {
            $temp_data = $this->removeNullFromArray($data);
            $max_data_length = max($max_data_length, count($temp_data));
        }
        $new_array = array();
        foreach ($rodata_array as $data) {
            // $info =  DB::table('deviceinfo')->where('device_id',$data['device_id'])->first();
            $new_array[] = array_slice($data, 0, $max_data_length);
        }
        $fields = ['voltage1','current1','kw1','kwh1','voltage2','current2','kw2','kwh2','voltage3','current3','kw3','kwh3','voltage4','current4','kw4','kwh4'];
      
        // $key_names = FieldName::all()->toArray();
        // return view('ro_datas.index',['paginated'=>$rodata,'rodata' => $new_array, 'max_data_length' => $max_data_length,'key_names' => $key_names]);
        // $rodata =  DB::table('ro_data')->get();
        return view('meter_datasgrid.index',['paginated'=>$rodata,'rodata' => $new_array, 'max_data_length' => $max_data_length,'fields' => $fields,]);
    }

    public function removeNullFromArray($array) : array{
        $keys = array_keys($array);
        $null_data_length = 0;
        for($i=sizeof($array)-1;$i>=0;$i--){
            if (empty($array[$keys[$i]])) {
                $null_data_length++;
            }else{
                break;
            }
        }
        return array_slice($array, 0, sizeof($array)-$null_data_length);
    }


    /**
     * Show the form for creating a new MeterData.
     *
     * @return Response
     */
    public function create()
    {
        return view('meter_datas.create');
    }

    /**
     * Store a newly created MeterData in storage.
     *
     * @param CreateMeterDataRequest $request
     *
     * @return Response
     */
    public function store(CreateMeterDataRequest $request)
    {
        $input = $request->all();

        $meterData = $this->meterDataRepository->create($input);

        Flash::success('Meter Data saved successfully.');

        return redirect(route('meterDatas.index'));
    }

    /**
     * Display the specified MeterData.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            Flash::error('Meter Data not found');

            return redirect(route('meterDatas.index'));
        }

        return view('meter_datas.show')->with('meterData', $meterData);
    }

    /**
     * Show the form for editing the specified MeterData.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            Flash::error('Meter Data not found');

            return redirect(route('meterDatas.index'));
        }

        return view('meter_datas.edit')->with('meterData', $meterData);
    }

    /**
     * Update the specified MeterData in storage.
     *
     * @param int $id
     * @param UpdateMeterDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeterDataRequest $request)
    {
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            Flash::error('Meter Data not found');

            return redirect(route('meterDatas.index'));
        }

        $meterData = $this->meterDataRepository->update($request->all(), $id);

        Flash::success('Meter Data updated successfully.');

        return redirect(route('meterDatas.index'));
    }

    /**
     * Remove the specified MeterData from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $meterData = $this->meterDataRepository->find($id);

        if (empty($meterData)) {
            Flash::error('Meter Data not found');

            return redirect(route('meterDatas.index'));
        }

        $this->meterDataRepository->delete($id);

        Flash::success('Meter Data deleted successfully.');

        return redirect(route('meterDatas.index'));
    }


       public function view_info($id)
    {
        // $roData = $this->roDataRepository->find($id);

        // if (empty($roData)) {
        //     Flash::error('Ro Data not found');

        //     return redirect(route('ro-data.index'));
        // }
        
          $data = DB::table('deviceinfo')->where('device_id',$id)->first();
           $alarm = DB::table('devicealarm')->where('device_id',$id)->get();
         
        return view('device_info.index')->with('device', $data)->with('alarm',$alarm);
    }

    
     public function devicelogs_export($id)
    {
        //  dd($id);
                   $info = DB::table('deviceinfo')->where('device_id',$id)->get();
                     
           $fileName = 'Logs_'.$info[0]->sap_id.'_'.Carbon::now();
           $datalogs = DB::table('ro_data_logs')->select('id','sap_id','date','time','cf1','cf2','cf3','cf4','cf5','cf6','cf7','cf8','cf9','cf10','cf11','cf12','cf13','cf14','cf15','cf16','created_at')->where('device_id',$id)->where( 'created_at', '>', Carbon::now()->subDays(60))->orderBy('id','desc')->get()->toArray();  
            // dd($datalogs); 
                $destinationPath = storage_path('exports/datalogs.csv');
                
                $file = fopen($destinationPath, 'w');
             
                fputcsv($file,['Sr No','SAP ID','DATE','TIME','CH1_Voltage','CH1_Current','CH1_KW','CH1_KWH','CH2_Voltage','CH2_Current','CH2_KW','CH2_KWH','CH3_Voltage','CH3_Current','CH3_KW','CH3_KWH','CH4_Voltage','CH4_Current','CH4_KW','CH4_KWH']);
              $id = 1;
                foreach ($datalogs as $row) {
                    $row->id = $id++;
                    
                  $row->date =  Carbon::parse($row->created_at)->format('d-m-Y');
                   $row->time =  Carbon::parse($row->created_at)->format('H:i:s');
                //   dd($date, $time);
                    $row->created_at = '';
                    fputcsv($file, (array) $row);
                }
                fclose($file);
         
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                return response()->download($destinationPath, $fileName.'.csv', $headers);
    }

 public function logs_export()
    {
       
           $fileName = 'Logs_all_device_'.Carbon::now();
           $datalogs = DB::table('ro_data_logs')->select('id','sap_id','date','time','cf1','cf2','cf3','cf4','cf5','cf6','cf7','cf8','cf9','cf10','cf11','cf12','cf13','cf14','cf15','cf16','created_at')->where( 'created_at', '>', Carbon::now()->subDays(60))->orderBy('id','desc')->get()->toArray();  
           
                $destinationPath = storage_path('exports/datalogs.csv');
                
                $file = fopen($destinationPath, 'w');
               
                fputcsv($file, ['Sr No','SAP ID','DATE','TIME','CH1_Voltage','CH1_Current','CH1_KW','CH1_KWH','CH2_Voltage','CH2_Current','CH2_KW','CH2_KWH','CH3_Voltage','CH3_Current','CH3_KW','CH3_KWH','CH4_Voltage','CH4_Current','CH4_KW','CH4_KWH']);
                 $id = 1;
                foreach ($datalogs as $row) {
                     $row->id = $id++;
                      $row->date =  Carbon::parse($row->created_at)->format('d-m-Y');
                   $row->time =  Carbon::parse($row->created_at)->format('h:m:s');
               
                    $row->created_at = '';
                    fputcsv($file, (array) $row);
                }
                fclose($file);
         
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                return response()->download($destinationPath, $fileName.'.csv', $headers);
    }

}
