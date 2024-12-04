<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @package App\Models
 *
 * @mixin Builder
 */
class SalesAverage extends Model {
	use HasFactory, SoftDeletes;

	const SHOP_ID             = 'property_id';
	const AVG_TOTAL           = 'avg_total';
	const AVG_FEES            = 'avg_fees';
	const AVG_ITEMS_PER_ORDER = 'avg_items_per_order';
	const AVG_CHECKOUT_TIME   = 'avg_checkout_time';
	const SUM_TOTAL           = 'sum_total';
	const SUM_FEES            = 'sum_fees';
	const ORDER_COUNT         = 'order_count';

	const RANGE  = 'range';
	const RANGES = [
		'daily',
		'weekly',
		'monthly',
		'yearly',
		'wtd', // Carbon::now()->startOfWeek()
		'mtd', // Carbon::now()->startOfMonth()
		'ytd', // Carbon::now()->startOfyear()
		'lifetime',
	];

	protected $fillable = [
		self::SHOP_ID,
		self::AVG_TOTAL,
		self::AVG_FEES,
		self::AVG_ITEMS_PER_ORDER,
		self::AVG_CHECKOUT_TIME,
		self::SUM_FEES,
		self::SUM_TOTAL,
		self::ORDER_COUNT,
		self::RANGE,
	];

	protected $visible = [
		self::AVG_TOTAL,
		self::AVG_FEES,
		self::AVG_ITEMS_PER_ORDER,
		self::AVG_CHECKOUT_TIME,
		self::SUM_FEES,
		self::SUM_TOTAL,
		self::ORDER_COUNT,
		self::RANGE,
	];

	protected static $time_in_seconds_map = [];

	public static function time_in_seconds_map( $range ) {
		if ( empty( self::$time_in_seconds_map ) ) {
			self::$time_in_seconds_map = [
				'daily'    => now()->subDay(),
				'weekly'   => now()->subWeek(),
				'monthly'  => now()->subMonth(),
				'yearly'   => now()->subYear(),
				'wtd'      => now()->startOfWeek(),
				'mtd'      => now()->startOfMonth(),
				'ytd'      => now()->startOfYear(),
				'lifetime' => 0,
			];
		}

		return array_key_exists( $range, self::$time_in_seconds_map ) ? self::$time_in_seconds_map[ $range ] : now();
	}

	public function property() {
		return $this->belongsTo( Property::class );
	}
}
