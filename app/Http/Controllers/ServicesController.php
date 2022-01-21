<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use App\Models\Services;

class ServicesController extends Controller
{

    public function index() {
        $title = 'Our Services';
        $data = Services::orderBy('id', 'asc')->paginate(6);
        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }
        $latest = Services::orderBy('id', 'asc')->take(12)->get();
        return view('services-index', [
            'title'     => $title,
            'data'      => $data,
            'latest'    => $latest,
        ]);
    }

    public function details (Request $request) {
        $data = Services::where('slug', $request->slug)->first();
        if (!$data) {
            return response()->json([
                'status'    => '404',
                'message'   => 'Page not found',
            ]);
        }
        $title = $data->title;
        return view('services-single', [
            'title'     => $title,
            'data'      => $data,
        ]);
    }

}