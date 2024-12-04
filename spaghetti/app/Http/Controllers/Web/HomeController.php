<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller {
	public function __invoke() {
		$data = Cache::remember( 'homepage_data', 5, function () {
			return [
				'oldest' => Property::first()->value( 'created_at' ),
			];
		} );

		return view( 'welcome', $data );
	}
}
