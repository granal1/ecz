<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visiteurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'url',
        'ip',
        'city',
        'device',
        'timestamp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'device' => 'array',
        'timestamp' => 'datetime',
    ];

    /**
     * Get the user that owns the visiteur record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
