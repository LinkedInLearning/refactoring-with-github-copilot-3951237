<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller {
	public function insert( Request $request ) {
		// Validate request
		$request->validate( [
			Sale::GATEWAY       => 'required|string',
			Sale::TOTAL         => 'required|numeric',
			Sale::FEES          => 'nullable|numeric',
			Sale::ITEM_COUNT    => 'required|integer',
			Sale::CHECKOUT_TIME => 'nullable|numeric',
			Sale::ORDER_ID      => 'required|numeric',
			'created_at'        => 'nullable|numeric',
		] );

		// Create the sale
		$sale                        = new Sale;
		$sale->{Sale::GATEWAY}       = $request->{Sale::GATEWAY};
		$sale->{Sale::TOTAL}         = $request->total;
		$sale->{Sale::FEES}          = $request->fees;
		$sale->{Sale::ITEM_COUNT}    = $request->item_count;
		$sale->{Sale::SHOP_ID}       = $request->id;
		$sale->{Sale::CHECKOUT_TIME} = $request->{Sale::CHECKOUT_TIME};
		$sale->{Sale::ORDER_ID}      = $request->{Sale::ORDER_ID};
		$sale->created_at            = $request->created_at ? Carbon::createFromTimestamp( $request->created_at )->toDateTimeString() : now();

		try {
			$sale->save();
		} catch ( \Exception $exception ) {
			if ( 23000 == $exception->getCode() ) {
				return response()->json( [ 'exception' => $request->{Sale::ORDER_ID} . ' already exists for ' . $request->id, ], 409 );
			}

			return response()->json( [ 'exception' => 'An unknown error occured', ], 403 );
		}


		return response()->json(
			[
				'sale_id' => $sale->id,
				'success' => 'You rock!',
			]
		);
	}
}
