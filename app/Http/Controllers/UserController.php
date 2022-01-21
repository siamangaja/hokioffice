<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use App\Models\User;
use App\Models\News;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:user');
    }

	public function index() {
        $data = User::where('id', auth()->id())->first();
		return redirect ('/')->with("success", "You have successfully logged in...");
	}

	public function dashboard () {
        return view('user.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

	public function profileUser () {
        $d = User::where('id', auth()->id())->first();
        $title = 'Edit Profile';
        return view('user.profile', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function saveprofileUser (Request $request) {
        $update = User::where('id', $id = auth()->id())
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'address'   => $request->address,
                'phone'     => $request->phone,
            ]);
            return redirect()->back()->with("success","Profil Anda sukses diperbarui...");
    }

    public function ChangePassword () {
        $id = auth()->id();
        $d = User::where('id', auth()->id())->first();
        $title = 'Change Password';
        return view('user.change-password', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function SavePassword (Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with("error","Password yang Anda masukkan tidak sesuai dengan password saat ini. Silahkan diulang...");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        return redirect()->back()->with("error","Password baru harus tidak boleh sama dengan saat ini. Silahkan diulang...");
        }
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
            return redirect()->back()->with("error","Kombinasi password baru tidak sama. Silahkan diulang...");
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password Anda sukses diganti...");
    }

    public function newsIndex () {
        $title = 'News';
        $data = News::orderBy('id', 'desc')->paginate(20);
        return view('admin.news-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function newsAdd () {
        $title = 'Add News';
        return view('admin.news-add', [
            'title' => $title,
        ]);
    }

    public function newsStore (Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $file = $request->file('image');
        $imageName1 = time().'-'.$file->getClientOriginalName();
        $imageName2 = Str::lower($imageName1);
        $imageName3 = preg_replace('/\s+/', '', $imageName2);
        $img = $request->image->move(public_path('storage/images'), $imageName3);

        $slug = Str::lower($string = str_replace(' ', '-', $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

        $News = new News;
        $News->title        = $request->title;
        $News->slug         = $slug;
        $News->content      = $request->content;
        $News->thumbnail    = $imageName3;
        $News->status       = $request->status;
        $News->save();
        return redirect ('admin/news')->with("success","Data created successfully...");
    }

    public function newsEdit ($id) {
        $data = News::where('id',$id)->first();
        return view('admin.news-edit', [
            'data' => $data,
            'title' => 'Edit News',
        ]);
    }

    public function newsUpdate (Request $request)
    {
        $update = News::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'content'   => $request->content,
                'status'    => $request->status,
            ]);
        return redirect ('admin/news')->with("success","Data updated successfully...");
    }

    public function newsDelete (Request $request) {
        $News = News::where('id', $request->id)->get();
        if (!$News) {
            return redirect ('admin/news')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = News::where('id', $request->id)->delete();
            return redirect ('admin/news')->with("success","Data deleted successfully...");
        }
    }

}