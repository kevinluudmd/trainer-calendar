<?php

namespace Trainer\Calendar\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use Trainer\Calendar\Availability;
use App\Http\Controllers\Controller;

use Trainer\Calendar\Requests\Availability\ShowRequest;
use Trainer\Calendar\Requests\Availability\UpdateRequest;

class AvailabilityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		dd('wtf');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Request $request
	 * @param int $user_id
	 *
	 * @throws ModelNotFoundException
	 *
	 * @return Response
	 */
	public function show(Request $request, $user_id)
	{
		//these are the input params
		$this->validate($request, [
			'timezone' => 'required|timezone',
		]);
		$availabilities = json_decode(Availability::userAvailabilties($user_id)->availabilities);
		//find requesting user's timezone offset to utc
		$request_date = Carbon::now(new \DateTimeZone($request->timezone));
		//convert offset (in seconds) to 30 minute intervals ($offset / 60 / 30)
		$offset = $request_date->getOffset() / 1800;
		//shift avail hours to match requesting timezone
		return [
			'data' => array_merge(array_splice($availabilities, $offset), $availabilities),
			'_tzOffset' => $offset
		];
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateRequest $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
