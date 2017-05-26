<?php namespace App\Http\Controllers;

use App\Models\VrCategories;

use App\Models\VrCategoriesTranslations;
use App\Models\VrLanguageCodes;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VrCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategories
	 *
	 * @return Response
	 */
	public function index()
	{
//        $dataFromModel = new VrCategories();
//        $config = [];
//        $config = $this->listBladeData();
//        $config['list'] = $dataFromModel->get()->toArray();
		return VrCategories::with(['categoryTranslation'])->get()->toArray();
//		return view('admin.page.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrcategories/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config = [];

        $config['lang'] = VrLanguageCodes::pluck('language_code', 'id')->toArray();
        //dd($config['lang']);
        return view('admin.page.create', $config);

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrcategories
	 *
	 * @return Response
	 */
	public function store()
	{

       $data = request()->all();
       $record = VrCategories::create([
               'id' => Uuid::uuid4(),
               'name' => $data['name'],
               'comment' => $data['description'],
               'language_id' => $data['language_code']
           ]);

       $translations = new VrCategoriesTranslationsController();
       $translations->storeFromVrCategoriesController($data, $record);



        return redirect()->route('app.categories.index');
	}

	/**
	 * Display the specified resource.
	 * GET /vrcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $config = [];
        $config = $this->listBladeData();
        $config['categories'] = VrCategories::find($id)->toArray();

        return view('admin.page.single', $config);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrcategories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config = [];
        $config['route'] = 'app.categories.edit';
        $config['id'] = $id;
        $config['item'] = VrCategories::find($id)->toArray();
        $config['lang'] = VrLanguageCodes::pluck('language_code', 'id')->toArray();
        //$config['trans'] = VrCategoriesTranslationsController::pluck('name','language_code', 'category_id', 'id')

        return view('admin.page.create', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config['categories'] = VrCategories::get()->toArray();
        $data = request()->all();
        $record = VrCategories::find($id);
        $record->update(
            [
                'id' => Uuid::uuid4(),
                'name' => $data['name'],
                'comment' => $data['description'],
                'language_id' => $data['language_id']
            ]
        );

        $translations = new VrCategoriesTranslations();
        $translations->storeFromCategories($data);

        return redirect()->route('app.categories.index', $config);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if (VrCategories::destroy($id)){
            return ["success" => true, "id" => $id];
        }
	}

    private function listBladeData() {
        $config = [];

        $config['edit'] = 'app.categories.edit';
        $config['create'] = 'app.categories.create';
        $config['show'] = 'app.categories.show';
        $config['delete'] = 'app.categories.destroy';

        return $config;
    }

    public function storeFromCategories()
    {
        $data = request()->all();
        VrCategoriesTranslations::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'language_code' => $data['language_code'],
            'category_id' => $data['category_id']
        ]);


    }

}