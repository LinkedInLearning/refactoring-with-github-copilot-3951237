<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Property
 *
 * @package App\Models
 *
 * @mixin Builder
 */
class Sale extends Model {
	use HasFactory;

	const SHOP_ID       = 'property_id';
	const ORDER_ID      = 'order_id';
	const TOTAL         = 'total';
	const FEES          = 'fees';
	const ITEM_COUNT    = 'item_count';
	const GATEWAY       = 'gateway';
	const CHECKOUT_TIME = 'checkout_time';

	protected $fillable = [
		self::SHOP_ID,
		self::TOTAL,
		self::FEES,
		self::ITEM_COUNT,
		self::GATEWAY,
		self::CHECKOUT_TIME,
		self::ORDER_ID,
	];

	protected $visible = [
		self::ITEM_COUNT,
		self::FEES,
		self::TOTAL,
		self::CHECKOUT_TIME,
		self::GATEWAY,
	];

	public function property() {
		return $this->belongsTo( Property::class );
	}

	public function sales_averages() {
		$this->hasMany( SalesAverage::class );
	}

	/**
	 * @param $fee
	 *
	 * @return string
	 *
	 * The fee is stored as an int
	 */
	public function getFeesAttribute( $fee ) {
		return number_format( $fee/100, 2 );
	}

}
