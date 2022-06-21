<?php

namespace App\Http\Controllers;

use App\DataTables\MeterDataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMeterDataRequest;
use App\Http\Requests\UpdateMeterDataRequest;
use App\Repositories\MeterDataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

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
}
