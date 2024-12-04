<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 *
 * @package App\Models
 *
 * @mixin Builder
 */
class Property extends Model {
	use HasFactory;

	const URL   = 'url';
	const NAME  = 'name';
	const TYPE  = 'type';
	const TYPES = [ 'site', 'shop', 'beerfinder' ];

	protected $fillable = [ self::URL, self::NAME, self::TYPE ];

	protected $visible = [ self::NAME, self::URL, 'lifetime_value' ];

	protected $wild = [ 'sales_average' ];

	public function sales() {
		return $this->hasMany( Sale::class, 'property_id' );
	}

	public function sales_average() {
		return $this->hasMany( SalesAverage::class );
	}

	public function plugins() {
		return $this->belongsToMany( Plugin::class );
	}

	public function plugin_count() {
		return $this->plugins()->count();
	}

	public function lifetime_value() {
		return $this->hasOne( SalesAverage::class )->where( 'range', 'lifetime' );
	}
}
