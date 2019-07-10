<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Visitor;
use Session;

class SingUpCntroller extends Controller {

    public function singUp() {
        return view('front-end.singUp', [
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }

    public function newVisitor(Request $request) {
        Visitor::saveVisitorInfo($request);
        return redirect('/')->with('message', 'Visitor Account Successfully');
    }

    public function mailCheck($email) {
        $visitor = Visitor::where('email_address', $email)->first();
        if ($visitor) {
            echo 'Email already exists !';
        } else {
            echo 'Email address available';
        }
    }

    public function visitorLogin() {
        return view('front-end.visitorLogin', [
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }

    public function newSingIn(Request $request) {
        $visitor = Visitor::where('email_address', $request->email_address)->first();
        if ($visitor) {
            if (password_verify($request->password, $visitor->password)) {
                Session::put('visitor_id', $visitor->id);
                Session::put('visitorName', $visitor->first_name . ' ' . $visitor->last_name);
                return redirect('/');
            } else {
                return redirect('/visitor-login')->with('message', 'Password not valid');
            }
        } else {
            return redirect('/visitor-login')->with('message', 'E-mail address not valid');
        }
    }

    public function visitorLogout(Request $request) {
        Session::forget('visitor_id');
        Session::forget('visitorName');
        return redirect('/')->with('message', 'Visitor Logout Successfully');
    }

}
