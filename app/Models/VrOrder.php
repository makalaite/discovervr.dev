<?php

namespace App\Models;



class VrOrder extends CoreModel
{
    use UuidTrait;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_order';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'status'];

    public function experiences() {
        return $this->belongsToMany(VrPages::class, 'vr_reservations', 'order_id', 'experience_id')->withPivot('time');
    }
}
