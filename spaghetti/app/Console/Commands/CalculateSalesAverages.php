<?php

namespace App\Console\Commands;

use App\Models\Property;
use App\Models\Sale;
use App\Models\SalesAverage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CalculateSalesAverages extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'sales:calc-averages';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Calculate Sales Average';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		// Calculate averages for each property
		// @TODO: Output might be nice
		Property::all()->each( function ( $property ) {
			$this->generate_averages( $property );
		} );

		return 0;
	}

	public function generate_averages( Property $property ) {
		$property->sales_average()->forceDelete();

		foreach ( [ 'wtd', 'mtd', 'ytd', 'lifetime' ] as $range ) {
			$calculatedSalesAverages = Sale::query()
			                               ->select( [
				                               DB::raw( 'round(AVG(total),2  ) as ' . SalesAverage::AVG_TOTAL ),
				                               DB::raw( 'round(AVG(fees),2  ) as ' . SalesAverage::AVG_FEES ),
				                               DB::raw( 'round(AVG(item_count),2  ) as ' . SalesAverage::AVG_ITEMS_PER_ORDER ),
				                               DB::raw( 'round(AVG(checkout_time),2  ) as ' . SalesAverage::AVG_CHECKOUT_TIME ),
				                               DB::raw( 'sum(total) as ' . SalesAverage::SUM_TOTAL ),
				                               DB::raw( 'sum(fees) as ' . SalesAverage::SUM_FEES ),
				                               DB::raw( 'count(*) as ' . SalesAverage::ORDER_COUNT ),
			                               ] )
			                               ->where( 'created_at', '>', SalesAverage::time_in_seconds_map( $range ) )
			                               ->where( 'property_id', $property->id )
			                               ->first();

			$salesAverages = new SalesAverage;
			$salesAverages->fill( $calculatedSalesAverages->only( $salesAverages->getFillable() ) );
			$salesAverages->{SalesAverage::RANGE}   = $range;
			$salesAverages->{SalesAverage::SHOP_ID} = $property->id;

			$salesAverages->save();
		}
	}
}
