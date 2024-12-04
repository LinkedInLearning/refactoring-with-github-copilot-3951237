<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class HomeRecentSales extends Component {
	public function render() {
		return view( 'livewire.home-recent-sales', [
			'recent_sales' => Sale::latest()->limit( 25 )->get(),
		] );
	}
}
