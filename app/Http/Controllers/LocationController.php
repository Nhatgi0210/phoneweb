<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Address;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function address()
    {
        $user = auth()->user(); 
        $provinces = Province::select('code', 'full_name')->get();
        $addresses = Address::where('user_id', $user->id)->get();
        return view('home.address', compact('user','provinces','addresses'));
    }
    //
    public function getDistricts(Request $request)
    {
        $provinceCode = $request->json('code');
        $districts = District::where('province_code', $provinceCode)->select('code','full_name')->get();
        return response()->json($districts);
    } 
    public function getwards(Request $request)
    {
        $districtCode = $request->json('code');
        $wards = Ward::where('district_code', $districtCode)->select('code','full_name')->get();
        return response()->json($wards);
    }
    public function addAddress(Request $request){
        $address = new Address(); 
        $address->user_id = $request->userId;
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->save();
        return redirect()->route('address');
    }
    public function addressToCart(Request $request){
        session(['address' => $request->address]);
        session(['phone'=> $request->phone ]);
        return redirect()->route('shopping_cart');
    }
}
