<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyCreateRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			Property::TYPE => [
				'required',
				Rule::in( Property::TYPES ),
			],
			Property::NAME => [ 'required', 'string' ],
			Property::URL  => [ 'required', 'url' ],
		];
	}
}
