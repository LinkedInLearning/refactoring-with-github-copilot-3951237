<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\Sale;
use Livewire\Component;

class PropertyAnalytics extends Component {

	public $property;

	public function render() {
		$sales_prop_id = Sale::query()->where( 'property_id', $this->property );

		return view( 'livewire.property-analytics', [
			'total_sales'        => '$' . number_format( $sales_prop_id->sum( 'total' ), 2 ),
			'total_fees'         => '$' . number_format( $sales_prop_id->sum( 'fees' )/100, 2 ),
			'total_sales_count'  => $sales_prop_id->count(),
			'sale_average'       => '$' . number_format( $sales_prop_id->average( 'total' ), 2 ),
			'order_size_average' => number_format( $sales_prop_id->average( 'item_count' ), 1 ),
			'plugins'           => Property::query()->where( 'id', $this->property )->first()->plugins->count(),
		] );
	}
}
