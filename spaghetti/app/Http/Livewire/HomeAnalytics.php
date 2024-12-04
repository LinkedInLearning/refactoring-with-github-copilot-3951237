<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HomeAnalytics extends Component {

	public function render() {
		return view( 'livewire.home-analytics', [
			'total_sales'      => '$' . number_format( DB::table( 'sales' )->sum( 'total' ), 2 ),
			'total_fees'       => '$' . number_format( DB::table( 'sales' )->sum( 'fees' )/100, 2 ),
			'total_properties' => DB::table( 'properties' )->count(),
			'sale_count'       => DB::table( 'sales' )->count(),
			'sale_average'     => '$' . number_format( DB::table( 'sales' )->average( 'fees' ), 2 ),
			'total_plugins'    => DB::table( 'plugins' )->count(),
		] );
	}
}
