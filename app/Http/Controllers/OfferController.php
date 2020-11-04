<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class OfferController extends Controller
{
    public function __construct(){

    }
    public function getOffers(){
        //return Offer::get();
        $offers = Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details',
            'price'
            )->get();
        return view('offers.allOffers',compact('offers'));
    }

    public function create(){
        return view('offers.create');
    }

    public function store(OfferRequest $request){
        //1- Validate data before insert into database
        //$rules = $this -> getRules();
        //$messages = $this->getMessages();

        /*$validator = Validator::make($request->all(),$rules,$messages);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)-> withInputs($request->all());
        }*/
        //2- Insert data into database
        Offer::create([
            'name_en' => $request -> name_en,
            'name_ar' => $request -> name_ar,
            'price' => $request -> price,
            'details_ar' => $request -> details_ar,
            'details_en' => $request -> details_en,

        ]);
        return redirect()->back()->with(['success'=>__('messages.Record added Successfully')]);
        //print "Data inserted Successfully";
    }
    //Function for messages validation
    /*protected function getMessages(){
        return $messages = [
            'name.required' => trans('messages.The Name field is required'),
            'price.numeric' => 'Price must be numeric',
        ];
    }*/
    //Function for rules validation
    /*protected function getRules(){
        return $rules =  [
            'name' => 'required|max:200|unique:offers,name',
            'price'=> 'required|numeric',
            'details' => 'required'
        ];
    }*/


}
