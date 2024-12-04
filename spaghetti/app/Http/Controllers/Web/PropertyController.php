<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PropertyController extends Controller {
	public function __invoke( $id ) {
		$data = Cache::remember( 'property_data_' . $id, 5, function () use ( $id ) {
			$property = Property::query()->where( 'id', $id )->first();

			return [
				'property' => $property,
				'oldest'   => $property->value( 'created_at' ),
			];
		} );

		return view( 'property', $data );
	}
}
