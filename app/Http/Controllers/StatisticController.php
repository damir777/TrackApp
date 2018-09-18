<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Visit;

class StatisticController extends Controller
{
    public function getUsers()
    {
        $users = User::get();

        foreach ($users as $user)
        {
            $visits = Visit::select(DB::raw('COUNT(id) AS counter, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time))))
                AS duration'))
                ->where('user_id', '=', $user->id)->first();

            $user->num_of_visits = $visits->counter;
            $user->duration = $visits->duration;
        }

        return view('users', ['users' => $users]);
    }

    public function getVisits(Request $request)
    {
        $visits = Visit::select('start_time', DB::raw('SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(end_time, start_time))) AS duration'))
            ->where('user_id', '=', $request->user)->paginate(15);

        $user = User::find($request->user)->cookie;

        return view('visits', ['visits' => $visits, 'user' => $user]);
    }
}