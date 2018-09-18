<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Visit;

class PageController extends Controller
{
    private $cookie;
    private $ip;
    private $country;
    private $region;
    private $currency_code;
    private $latitude;
    private $longitude;
    private $browser;

    public function getHomepage()
    {
        $this->setCookie();
        $this->getUserInfo();
        $this->createNewVisit();

        return view('homepage');
    }

    private function setCookie()
    {
        if (!Session::has('track_session'))
        {
            $cookie = substr(md5(rand()), 0, 40);

            $this->cookie = $cookie;

            Session::put('track_session', $cookie);
        }
        else
        {
            $this->cookie = Session::get('track_session');
        }
    }

    private function getUserInfo()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

        $this->ip = $geo['geoplugin_request'];
        $this->country = $geo['geoplugin_countryName'];
        $this->region = $geo['geoplugin_region'];
        $this->currency_code = $geo['geoplugin_currencyCode'];
        $this->latitude = $geo['geoplugin_latitude'];
        $this->longitude = $geo['geoplugin_longitude'];
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
    }

    private function createNewVisit()
    {
        $start_time = date('Y-m-d H:i:s');

        $current_user = $this->getCurrentUser();

        if (!$current_user)
        {
            $user = new User;
            $user->cookie = $this->cookie;
            $user->ip = $this->ip;
            $user->country = $this->country;
            $user->region = $this->region;
            $user->currency_code = $this->currency_code;
            $user->latitude = $this->latitude;
            $user->longitude = $this->longitude;
            $user->browser = $this->browser;
            $user->save();

            $current_user = $user->id;
        }

        $visit = new Visit;
        $visit->user_id = $current_user;
        $visit->start_time = $start_time;
        $visit->save();
    }

    private function getCurrentUser()
    {
        $user = User::select('id')->where('cookie', '=', Session::get('track_session'))->first();

        if (!$user)
        {
            return false;
        }

        return $user->id;
    }

    public function saveVisitEndTime()
    {
        $current_user = $this->getCurrentUser();

        $end_time = date('Y-m-d H:i:s');

        Visit::where('user_id', '=', $current_user)->whereNull('end_time')->orderBy('id', 'desc')->take(1)
            ->update(['end_time' => $end_time]);

        return response()->json(['status' => 1]);
    }
}