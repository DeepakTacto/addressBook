<?php

namespace App\Http\Controllers;
ini_set('memory_limit', -1);
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helper\CurlHelper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function manageAddress(){
        $count = Session::get('addressCount');
        //var_dump($count);die;
        if($count > 1){
            Session::flash('message', 'You cannot add more than two messages.Please delete one.');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('address');
        }else{
        return view('address');
        }
    }

    public function viewAddress(){
        $id = Auth::id();
        $url = "http://addressbook.test:8080/api/address/$id";
        $data = array();
        $response = CurlHelper::doCurl('GET', $url, '');
        $result = json_decode($response, true);

        session()->regenerate();
        Session::put('addressCount', count($result));
        foreach ($result as $key => $val){
            $data[$key]['id'] = $val['id'];
            $data[$key]['userId'] = $val['userId'];
            $data[$key]['title'] = $val['title'];
            $data[$key]['contactNumbar'] = $val['contactNumbar'];
            $data[$key]['addressLine1'] = $val['addressLine1'];
            $data[$key]['addressLine2'] = $val['addressLine2'];
            $data[$key]['addressLine3'] = $val['addressLine3'];
            $data[$key]['pincode'] = $val['pincode'];
            $data[$key]['street'] = $val['street'];
            $data[$key]['state'] = $val['state'];
            $data[$key]['city'] = $val['city'];
        }

        return view('viewAddress')->with('data',$data);
    }

    public function saveAddress(Request $request){
        $address = $request->validate([
            'name' => 'required',
            'contact_number'=> 'required|numeric',
            'address1'=> 'required'
        ]);
        $method = $request->input('method');
        if($request->input('method') == 'PUT'){
            $id = $request->input('id');
            $data['address_id'] = $id;
            $url = "http://addressbook.test:8080/api/address";
        }else{
            $url = "http://addressbook.test:8080/api/address";
            $data['userId'] = Auth::id();
        }
        $data['userId'] = Auth::id();
        $data['title'] = $request->input('title');
        $data['name'] = $request->input('name');
        $data['contactNumbar'] = $request->input('contact_number');
        $data['addressLine1'] = $request->input('address1');
        $data['addressLine2'] = $request->input('address2');
        $data['addressLine3'] = $request->input('address3');
        $data['pincode'] = $request->input('pincode');
        $data['street'] = $request->input('street');
        $data['state'] = $request->input('state');
        $data['city'] = $request->input('city');

        $response = CurlHelper::doCurl($method,$url, $data);
        var_dump($response);
        return redirect()->route('address');
    }


    public function updateAddress($id){
        $contact = Address::find($id);
        return view('address')->with('contact',$contact);
    }
}
