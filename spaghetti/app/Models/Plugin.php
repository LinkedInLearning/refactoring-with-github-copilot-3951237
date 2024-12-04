<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\ForwardsCalls;

/**
 * Class Property
 * @package App\Models
 *
 * @mixin Builder
 */
class Plugin extends Model
{
    use HasFactory, ForwardsCalls;

    const NAME = 'plugin_name';
    const VERSION = 'plugin_version';
    const PROPERTY_ID = 'property_id';

    protected $fillable = [
        self::NAME,
        self::VERSION,
    ];

    protected $visible = [
        self::NAME,
        self::VERSION,
    ];


    public function properties()
    {
        return $this->belongsToMany(Property::class)->orderBy( Property::NAME );
    }
}
