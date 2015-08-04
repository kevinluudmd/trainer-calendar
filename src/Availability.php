<?php

namespace Trainer\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Availability extends Model
{
	protected $table = 'availability';

	protected $connection = 'calendar';

	/**
	 * Find specific user's availibilities
	 * @param $query
	 * @param int $user_id
	 *
	 * @throws ModelNotFoundException
	 *
	 * @return Availability
	 */
	public function scopeUserAvailabilties($query, $user_id)
	{
		return $query->where('user_id', $user_id)->firstOrFail(['availabilities']);
	}

}
