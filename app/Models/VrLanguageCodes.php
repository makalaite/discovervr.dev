<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VrLanguageCodes extends Model
{
    public $incrementing = false;
    public $updated_at = false;
    use UuidTrait;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_language_codes';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'page_id', 'language_code'];
}
