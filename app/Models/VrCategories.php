<?php

namespace App\Models;



class VrCategories extends CoreModel
{
    use UuidTrait;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_categories';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'name', 'comment', 'language_id'];

    public function categoryTranslation()
    {
        return $this->belongsToMany(VrLanguageCodes::class, 'vr_categories_translations', 'category_id', 'language_code' );
    }
}
