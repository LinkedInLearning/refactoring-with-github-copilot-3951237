<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Models\Property;
use Illuminate\Http\Request;

class PluginController extends Controller {

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function insert( Request $request ) {
		// Validate request
		$request->validate( [
			'plugins'           => 'required|array',
			'plugins.*.name'    => 'required|string',
			'plugins.*.version' => 'required|string',
		] );

		// Delete existing plugins relationships
		Property::query()->find( $request->id )->plugins()->detach();

		// Save new plugins relationships
		foreach ( $request->plugins as $plugin ) {
			$plugin_model = Plugin::firstOrCreate( [
				Plugin::NAME    => $plugin['name'],
				Plugin::VERSION => $plugin['version'],
			] );
			$plugin_model->properties()->attach( $request->id );
			$plugin_model->save();
		};

		// Success!
		return response()->json(
			[
				'property_id' => $request->id,
				'success'     => 'You rock!',
			]
		);
	}

	public function get_plugins( $id ) {

	}
}
