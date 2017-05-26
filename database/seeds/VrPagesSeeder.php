<?php

use App\Models\VrPages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VrPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $pages = [
            ["id" => "the_lab", "category_id" => "about", 'slug'=>'lab'],
            ["id" => "samsung_irklavimas", "category_id" => "virtual-rooms", 'slug'=>'irklavimas'],
            ["id" => "ktu_parasparnis", "category_id" => "virtual-rooms", 'slug'=>'parasparnis'],
            ["id" => "hurl", "category_id" => "virtual-rooms", 'slug'=>'hurl'],
            ["id" => "tilt_brush", "category_id" => "virtual-rooms", 'slug'=>'brush'],
            ["id" => "fruit_ninja", "category_id" => "virtual-rooms", 'slug'=>'ninja'],
        ];

        DB::beginTransaction();
        try {
            foreach ($pages as $page) {
                $record = VrPages::find($page['id']);
                if (!$record) {
                    VrPages::create($page);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure '. $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();

    }
}
