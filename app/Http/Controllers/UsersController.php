<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FetchHttp;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke()
    {
        $response = FetchHttp::get('http://188.166.177.87/ignapi/');
        $response = json_decode($response, TRUE);

        $newEntry = [];
        $message = count($newEntry) . " new entry data has been added to the database.";
        foreach ($response as $key => $value) {
            $user = User::where('email', $value['email'])->first();
            if (empty($user)) {
                $value['need_pickup'] = (int) $value['need_pickup'];
                $newUser = User::create($value);
                array_push($newEntry, $newUser);
            }
        }

        if (empty($newEntry)) {
            $message = "No new data";
        }

        return view('user', [
            'users' => $response,
            'message' => $message
        ]);
    }
}
