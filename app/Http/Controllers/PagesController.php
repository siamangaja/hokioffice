<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use App\Models\Pages;
use App\Models\Services;
use App\Models\Testimonials;
use App\Models\News;
use App\Models\Features;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PagesController extends Controller
{

    public function frontpage () {
        $Features = Features::orderBy('id', 'asc')->take(3)->get();
        $About = Pages::where('slug', 'about')->first();
        $Services = Services::orderBy('id', 'asc')->take(8)->get();
        $Testimonials = Testimonials::orderBy('id', 'asc')->take(8)->get();
        $News = News::orderBy('id', 'desc')->where('status', 1)->take(8)->get();
        return view('frontpage', [
            'title'         => opsi('slogan'),
            'Features'      => $Features,
            'About'         => $About->content,
            'Services'      => $Services,
            'Testimonials'  => $Testimonials,
            'News'          => $News,
        ]);
    }

    public function pages (Request $request) {
        $data = Pages::where('slug', $request->slug)->first();

        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }

        $title = $data->title;
        return view('single', [
            'title' => $title,
            'data'  => $data->content,
        ]);
    }

    public function about () {
        $data = Pages::where('slug', 'about')->first();
        $Services = Services::orderBy('id', 'desc')->take(8)->get();
        $Testimonials = Testimonials::orderBy('id', 'asc')->take(8)->get();
        $title = 'About Us';
        return view('about', [
            'title'         => $title,
            'data'          => $data->content,
            'Services'      => $Services,
            'Testimonials'  => $Testimonials,
        ]);
    }

    public function contact () {
        $title = 'Contact Us';
        return view('contact', [
            'title' => $title,
        ]);
    }

    public function submitContact (Request $request) {
        $datanotif = [
            'name'      => $request->name,
            'email'     => $request->email,
            'msg'       => $request->msg,
            'subject'   => 'Form kontak website dari: '.$request->name
        ];
        $SentMail = Mail::send('email-contact', $datanotif, function($message) use ($datanotif)
        {
            $message->to(opsi('email'));
            $message->subject($datanotif['subject']);
        });
        return redirect ('contact')->with("success","Form submitted successfully...");
    }

}