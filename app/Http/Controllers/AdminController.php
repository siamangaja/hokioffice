<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use Auth;
use Hash;
use Route;
//use URL;
use Redirect;
use App\Models\Admin;
use App\Models\User;
use App\Models\Features;
use App\Models\Services;
use App\Models\News;
use App\Models\Testimonials;
use App\Models\Pages;
use App\Models\Options;

class AdminController extends Controller
{

    public function dashboard () {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function profile () {
        $d = Admin::where('id', auth()->id())->first();
        $title = 'My Profile';
        return view('admin.profile', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function changePassword () {
        $id = auth()->id();
        $d = User::where('id', auth()->id())->first();
        $title = ' Change Password';
        return view('admin.change-password', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function savePassword (Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with("error","Your current password that you entered does not match...");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        return redirect()->back()->with("error","New password must not be the same as the current one....");
        }
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
            return redirect()->back()->with("error","Your new password that you entered does not match...");
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Your password has been changed successfully...");
    }

    public function userIndex () {
        $title = 'User Manager';
        $data = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function userEdit ($id)
    {
        $User = User::find($id);
        return response()->json([
          'data' => $User
        ]);
    }

    public function userUpdate (Request $request)
    {
        $update = User::where('id',$request->id)
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'status'    => $request->status,
            ]);
        return redirect ('admin/users')->with("success","Data updated successfully...");
    }

    public function userDelete (Request $request) {
        $Users = User::where('id', $request->id)->get();
        if (!$Users) {
            return redirect ('admin/users')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = User::where('id', $request->id)->delete();
            return redirect ('admin/users')->with("success","Data deleted successfully...");
        }
    }

    public function featuresIndex () {
        $title = 'Features';
        $data = Features::orderBy('id', 'asc')->paginate(10);
        return view('admin.features-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function featuresAdd () {
        $title = 'Add Features';
        return view('admin.features-add', [
            'title' => $title,
        ]);
    }

    public function featuresStore (Request $request) {
        $segments = str_replace(url('/'), '', url()->previous());
        $a = explode('/add',$segments);
        $urlto = array_shift($a);
        $Features = new Features;
        $Features->icon     = $request->icon;
        $Features->title    = $request->title;
        $Features->content  = $request->content;
        $Features->save();
        return redirect ($urlto)->with("success","Data created successfully...");
    }

    public function featuresEdit ($id) {
        $data = Features::where('id',$id)->first();
        return view('admin.features-edit', [
            'data' => $data,
            'title' => 'Edit Features',
        ]);
    }

    public function featuresUpdate (Request $request)
    {
        $update = Features::where('id',$request->id)
            ->update([
                'icon'      => $request->icon,
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        return redirect()->back()->with("success","Data updated successfully...");
    }

    public function featuresDelete (Request $request) {
        $Features = Features::where('id', $request->id)->get();
        if (!$Features) {
            return redirect()->back()->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Features::where('id', $request->id)->delete();
            return redirect()->back()->with("success","Data deleted successfully...");
        }
    }

    public function servicesIndex () {
        $title = 'Services';
        $data = Services::orderBy('id', 'asc')->paginate(20);
        return view('admin.services-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function servicesAdd () {
        $title = 'Add Services';
        return view('admin.services-add', [
            'title' => $title,
        ]);
    }

    public function servicesStore (Request $request) {
        $segments = str_replace(url('/'), '', url()->previous());
        $a = explode('/add',$segments);
        $urlto = array_shift($a);

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

        $Services = new Services;
        $Services->thumbnail    = $imageName3;
        $Services->title        = $request->title;
        $Services->slug         = $slug;
        $Services->intro        = $request->intro;
        $Services->content      = $request->content;
        $Services->save();
        return redirect ($urlto)->with("success","Data created successfully...");
    }

    public function servicesEdit ($id) {
        $data = Services::where('id',$id)->first();
        return view('admin.services-edit', [
            'data' => $data,
            'title' => 'Edit Services',
        ]);
    }

    public function servicesUpdate (Request $request)
    {
        $update = Services::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'intro'     => $request->intro,
                'content'   => $request->content,
            ]);
        return redirect()->back()->with("success","Data updated successfully...");
    }

    public function servicesDelete (Request $request) {
        $Services = Services::where('id', $request->id)->get();
        if (!$Services) {
            return redirect()->back()->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Services::where('id', $request->id)->delete();
            return redirect()->back()->with("success","Data deleted successfully...");
        }
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
        $segments = str_replace(url('/'), '', url()->previous());
        $a = explode('/add',$segments);
        $urlto = array_shift($a);

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
        return redirect ($urlto)->with("success","Data created successfully...");
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
        return redirect()->back()->with("success","Data updated successfully...");
    }

    public function newsDelete (Request $request) {
        $News = News::where('id', $request->id)->get();
        if (!$News) {
            return Redirect::back()->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = News::where('id', $request->id)->delete();
            return Redirect::back()->with("success","Data deleted successfully...");
        }
    }

    public function testimonialsIndex () {
        $title = 'Testimonials';
        $data = Testimonials::orderBy('id', 'desc')->paginate(20);
        return view('admin.testimonial-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function testimonialsAdd () {
        $title = 'Add Testimonial';
        return view('admin.testimonial-add', [
            'title' => $title,
        ]);
    }

    public function testimonialsStore (Request $request) {
        $segments = str_replace(url('/'), '', url()->previous());
        $a = explode('/add',$segments);
        $urlto = array_shift($a);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $file = $request->file('image');
        $imageName1 = time().'-'.$file->getClientOriginalName();
        $imageName2 = Str::lower($imageName1);
        $imageName3 = preg_replace('/\s+/', '', $imageName2);
        $img = $request->image->move(public_path('storage/images'), $imageName3);

        $Testimonials = new Testimonials;
        $Testimonials->image    = $imageName3;
        $Testimonials->name     = $request->name;
        $Testimonials->company  = $request->company;
        $Testimonials->content  = $request->content;
        $Testimonials->save();
        return redirect ($urlto)->with("success","Data created successfully...");
    }

    public function testimonialsEdit ($id) {
        $data = Testimonials::where('id',$id)->first();
        return view('admin.testimonial-edit', [
            'data' => $data,
            'title' => 'Edit Testimonial',
        ]);
    }

    public function testimonialsUpdate (Request $request)
    {
        $update = Testimonials::where('id',$request->id)
            ->update([
                'name'      => $request->name,
                'company'   => $request->company,
                'content'   => $request->content,
            ]);
        return redirect()->back()->with("success","Data updated successfully...");
    }

    public function testimonialsDelete (Request $request) {
        $Testimonials = Testimonials::where('id', $request->id)->get();
        if (!$Testimonials) {
            return redirect()->back()->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Testimonials::where('id', $request->id)->delete();
            return redirect()->back()->with("success","Data deleted successfully...");
        }
    }

    public function pagesIndex () {
        $title = 'Pages';
        $data = Pages::orderBy('id', 'asc')->paginate(20);
        return view('admin.page-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function pagesAdd () {
        $title = 'Add Page';
        return view('admin.page-add', [
            'title' => $title,
        ]);
    }

    public function pagesStore (Request $request) {
        $segments = str_replace(url('/'), '', url()->previous());
        $a = explode('/add',$segments);
        $urlto = array_shift($a);
        $slug = Str::lower($string = str_replace(' ', '-', $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $Pages = new Pages;
        $Pages->title       = $request->title;
        $Pages->slug        = $slug;
        $Pages->content     = $request->content;
        $Pages->save();
        return redirect ($urlto)->with("success","Data created successfully...");
    }

    public function pagesEdit ($id) {
        $data = Pages::where('id',$id)->first();
        return view('admin.page-edit', [
            'data' => $data,
            'title' => 'Edit Page',
        ]);
    }

    public function pagesUpdate (Request $request)
    {
        $update = Pages::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'content'   => $request->content,
            ]);
        return redirect()->back()->with("success","Data updated successfully...");
    }

    public function pagesDelete (Request $request) {
        $Pages = Pages::where('id', $request->id)->get();
        if (!$Pages) {
            return redirect()->back()->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Pages::where('id', $request->id)->delete();
            return redirect()->back()->with("success","Data deleted successfully...");
        }
    }

    public function optionsIndex () {
        $title = 'Web Options';
        $data = Options::orderBy('id', 'asc')->paginate(20);
        return view('admin.options-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function optionsEdit ($id) {
        $data = Options::where('id',$id)->first();
        return view('admin.options-edit', [
            'data' => $data,
            'title' => 'Edit Options',
        ]);
    }

    public function optionsUpdate (Request $request)
    {
        $update = Options::where('id',$request->id)
            ->update([
                'value' => $request->value,
            ]);
        return redirect ('admin/options')->with("success","Web Options updated successfully...");
    }

    public function IndexDeposit() {
        $title = 'Data Deposit';
        $data = Deposit::orderBy('id', 'desc')->with('User')->paginate(20);
        return view('admin.deposit-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function DeleteDeposit (Request $request) {
        $Deposit = Deposit::where('ref', $request->ref)->get();
        if (!$Deposit) {
            return redirect ('admin/deposit')->with("error","Terjadi kesalahan...");
        }
        else{
            $Delete = Deposit::where('ref', $request->ref)->delete();
            return redirect ('admin/deposit')->with("success","Data berhasil dihapus...");
        }
    }

    public function ValidateDeposit (Request $request) {
        $Deposit = Deposit::where('ref', $request->ref)->first();
        if (!$Deposit) {
            return redirect ('admin/deposit')->with("error","Terjadi kesalahan...");
        }
        else {
            $update = Deposit::where('ref', $Deposit->ref)
            ->update([
                'status' => 1
            ]);

            $databalance = Wallet::orderBy('id', 'desc')->where('user_id', $Deposit->user_id)->take(1)->get();

            if ($databalance) {
                $balance = 0;
            }

            foreach($databalance as $b) {
                $balance = $b->balance;
            }

            //Tambahkan balance ke User
            $NewWallet = new Wallet;
            $NewWallet->user_id = $Deposit->user_id;
            $NewWallet->type    = 'credit';
            $NewWallet->amount  = $Deposit->total;
            $NewWallet->balance = $balance+$Deposit->total;
            $NewWallet->notes   = 'Deposit: '.$Deposit->ref;
            $NewWallet->save();
            return redirect ('admin/deposit')->with("success","Data berhasil divalidasi...");
        }
    }

    public function IndexWithdraw() {
        $title = 'Data Withdraw';
        $data = Withdraw::orderBy('id', 'desc')->with('User')->paginate(20);
        return view('admin.withdraw-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function DeleteWithdraw (Request $request) {
        $Withdraw = Withdraw::where('ref', $request->ref)->get();
        if (!$Withdraw) {
            return redirect ('admin/withdraw')->with("error","Terjadi kesalahan...");
        }
        else{
            $Delete = Withdraw::where('ref', $request->ref)->delete();
            return redirect ('admin/withdraw')->with("success","Data berhasil dihapus...");
        }
    }

    public function ValidateWithdraw (Request $request) {
        $Withdraw = Withdraw::where('ref', $request->ref)->first();
        if (!$Withdraw) {
            return redirect ('admin/withdraw')->with("error","Terjadi kesalahan...");
        }
        else {
            $update = Withdraw::where('ref', $Withdraw->ref)
            ->update([
                'status' => 1
            ]);
            return redirect ('admin/withdraw')->with("success","Data berhasil divalidasi...");
        }
    }

    public function IndexVirtualBalance() {
        $title = 'Virtual Balance';
        $data = VirtualBalance::orderBy('id', 'desc')->with('User')->paginate(20);
        return view('admin.virtual-balance', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

     public function DeleteVirtualBalance (Request $request) {
        $VirtualBalance = VirtualBalance::where('id', $request->id)->get();
        if (!$VirtualBalance) {
            return redirect ('admin/virtual-balance')->with("error","Terjadi kesalahan...");
        }
        else{
            $Delete = VirtualBalance::where('id', $request->id)->delete();
            return redirect ('admin/virtual-balance')->with("success","Data berhasil dihapus...");
        }
    }

    public function IndexTransactions() {
        $title = 'Transactions';
        $data = Transactions::orderBy('id', 'desc')->with('User')->paginate(20);
        return view('admin.transactions-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function BalanceManagerIndex() {
        $title = 'Balance Manager';
        $data = VirtualBalance::latest('user_id')->groupBy('user_id')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.balance-manager', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function BalanceManagerEdit ($id)
    {
        $VirtualBalance = VirtualBalance::find($id);
        return response()->json([
          'data' => $VirtualBalance,
        ]);
    }

    public function BalanceManagerUpdate (Request $request)
    {
        $update = VirtualBalance::where('id',$request->id)
            ->update([
                'balance' => $request->balance,
            ]);
        return redirect ('admin/balance-manager')->with("success","Data updated successfully...");
    }

    public function bankIndex () {
        $title = 'Bank Account';
        $data = BankAdmin::orderBy('id', 'desc')->paginate(20);
        return view('admin.bank-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function bankEdit ($id)
    {
        $BankAdmin = BankAdmin::find($id);
        return response()->json([
          'data' => $BankAdmin,
        ]);
    }

    public function bankUpdate (Request $request)
    {
        $update = BankAdmin::where('id',$request->id)
            ->update([
                'bank'          => $request->bank,
                'number'        => $request->number,
                'account_name'  => $request->account_name,
                'status'        => $request->status,
            ]);
        return redirect ('admin/bank')->with("success","Data updated successfully...");
    }

}