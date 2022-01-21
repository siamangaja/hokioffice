<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use App\Models\News;

class NewsController extends Controller
{

    public function index() {
        $title = 'News';
        $data = News::orderBy('id', 'desc')->where('status', 1)->paginate(6);
        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }
        $latest = News::orderBy('id', 'desc')->where('status', 1)->take(12)->get();
        return view('news-index', [
            'title'     => $title,
            'data'      => $data,
            'latest'    => $latest,
        ]);
    }

    public function details (Request $request) {
        $data = News::where('slug', $request->slug)->where('status', 1)->first();
        $latest = News::orderBy('id', 'desc')->where('status', 1)->take(12)->get();

        if (!$data) {
            return response()->json([
                'status'    => '404',
                'message'   => 'Page not found',
            ]);
        }

        $title = $data->title;
        return view('news-single', [
            'title'     => $title,
            'data'      => $data,
            'latest'    => $latest,
        ]);
    }

}