<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class PropertyRecentSales extends Component {

	public $property;

	public function render() {
		return view( 'livewire.property-recent-sales', [
			'recent_sales' => Sale::latest()->where( 'property_id', $this->property )->limit( 25 )->get(),
		] );
	}
}
