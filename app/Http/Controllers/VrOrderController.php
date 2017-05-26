<?php namespace App\Http\Controllers;

use App\Models\VrOrder;
use App\Models\VrPages;
use App\Models\VrReservations;
use Illuminate\Routing\Controller;

class VrOrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrorder
	 *
	 * @return Response
	 */
	public function index()
	{
		return VrOrder::with(['experiences'])->get()->toArray();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrorder/create
	 *
	 * @return Response
	 */
	public function create()
	{

		$config = [];
		$config['rooms'] = VrPages::where('category_id', '=', 'virtual-rooms')->pluck('slug', 'id');
		return view ('frontEnd.createOrder', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrorder
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = request()->all();
		$experience = [];
		foreach($data['room'] as $key => $room){
		    $key = [];
		    foreach($data[$room.'time'] as $time) {
		        array_push($key, $data[$room.'date'] . ' ' . $time);
            }
		    $experience[$room] = $key;
        }

        if(sizeOf($experience) > 0) {
            $record = VrOrder::create([
                'status' => 1,
            ]);

            $reservationTable = new VrReservationsController();
            $reservationTable->storeFromOrder($experience, $record);
        }

    }

	/**
	 * Display the specified resource.
	 * GET /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrorder/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}