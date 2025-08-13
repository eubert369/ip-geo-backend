<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $history = new History();
            $history->user_id = $user->id;
            $history->ip = $request->input('ip');
            $history->city = $request->input('city');
            $history->region = $request->input('region');
            $history->country = $request->input('country');
            $history->loc = $request->input('loc');
            $history->org = $request->input('org');
            $history->postal = $request->input('postal');
            $history->timezone = $request->input('timezone');
            $history->readme = $request->input('readme');
            $history->save();
            return response()->json(['msg' => 'Successfully Saved']);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Internal System Error', 'err' => $th], 503);
        }
    }

    public function all()
    {
        try {
            $user = Auth::user();

            $history = History::select(['ip', 'city', 'region', 'country', 'loc', 'org', 'postal', 'timezone', 'readme'])->where(['user_id' => $user->id])->get();

            return response()->json($history);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Internal System Error', 'err' => $th], 503);
        }
    }
}
