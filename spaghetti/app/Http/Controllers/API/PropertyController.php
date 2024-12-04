<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyCreateRequest;
use App\Models\Property;

class PropertyController extends Controller {
	public function store( PropertyCreateRequest $request ) {
		$property = new Property;
		$property
			->fill( $request->only( $property->getFillable() ) )
			->save();

		return response()->json( [ 'property_id' => $property->id ] );
	}

	public function update( PropertyCreateRequest $request ) {
		$property = Property::find( $request->id );
		$property
			->fill( $request->only( $property->getFillable() ) )
			->save();

		return response()->json( [ 'property_id' => $property->id ] );
	}

	public function show( $id ) {
		return Property::where( 'id', $id )->first()->load('sales_average', 'plugins');
	}

	public function get_sales( $id ) {
		return Property::where( 'id', $id )->first()->sales_average()->getResults();
	}

	public function get_plugins( $id ) {
		return Property::where( 'id', $id )->first()->plugins()->getResults();
	}
}
