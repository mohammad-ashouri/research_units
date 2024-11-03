<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchUnitInformation extends Model
{
    use SoftDeletes;

    /**
     * Table name
     * @var string
     */
    public $table = 'research_unit_information';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'unit_id',
        'form',
        'adder',
        'editor',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
