<?php namespace App\Http\Controllers;

use App\Models\VrCategoriesTranslations;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VrCategoriesTranslationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategoriestranslations
	 *
	 * @return Response
	 */
	public function index()
	{
	    $config = [];
        $config['categoryTransl'] = VrCategoriesTranslations::get()->toArray();
        return view('', $config);
	}

	public function indexUser()
    {

    }

	/**
	 * Show the form for creating a new resource.
	 * GET /vrcategoriestranslations/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrcategoriestranslations
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	public function storeFromVrCategoriesController($data, $record)
    {
        if(isset($data['name'])) {

            VrCategoriesTranslations::create([
                'language_code' => 'LT',
                'category_id' => $record->id,
                'name' => $data['name']
            ]);
        }

        if (isset($data['name_en'])) {

            VrCategoriesTranslations::create([
                'language_code' => 'EN',
                'category_id' => $record->id,
                'name' => $data['name_en']
            ]);
        }
    }

	/**
	 * Display the specified resource.
	 * GET /vrcategoriestranslations/{id}
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
	 * GET /vrcategoriestranslations/{id}/edit
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
	 * PUT /vrcategoriestranslations/{id}
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
	 * DELETE /vrcategoriestranslations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}