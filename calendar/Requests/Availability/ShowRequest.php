<?php

namespace Trainer\Calendar\Requests\Availability;

use App\Http\Requests\Request;

class ShowRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'timezone' => 'required|timezone',
        ];
    }

//	public function wantsJson()
//	{
//		return 1;
//	}

}
