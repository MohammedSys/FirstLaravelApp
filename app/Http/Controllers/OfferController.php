<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;

use App\Http\Controllers\Controller;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class OfferController extends Controller
{
    use OfferTrait;
    public function __construct(){

    }
    public function getOffers(){
        //return Offer::get();
        $offers = Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details',
            'photo',
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
        //Save Photo in folder
        $file_name = $this->saveImage($request -> photo , 'images/offers');
        //return 'Okey';
        //2- Insert data into database
        Offer::create([
            'photo' => $file_name,
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
    public function editOffer($offer_id){
        //$offer = Offer::findOrFail($offer_id);
        $offer = Offer::find($offer_id);//Search in given id
        if(!$offer) return redirect()->back();
            $offer = Offer::select('id','name_ar','name_en','details_ar','details_en','price') -> find($offer_id);
            return view('offers.edit',compact('offer'));
        //return $offer_id;
    }

    public function updateOffer(OfferRequest $request, $offer_id){
        //Validate using OfferRequest

        //Check if Offer Exist
        $offer = Offer::find($offer_id);
        if(!$offer) return redirect() -> back();
        //Update Data
        $offer->update($request -> all());
        return redirect()->back()->with(['success'=>__('messages.Updated Successfully')]);
        //If You Wanna Update Individual Fields Use :
        /*$offer::update([
            'name_ar' => $request -> name_ar,
            'name_ar' => $request -> name_en,
        ]);*/
    }

    public function deleteOffer($offer_id){
        //Check if Offer Exist
        $offer =  Offer::find($offer_id);
        if(!$offer)
            return redirect()->back()->with(['error' => __('messages.Offer is not Exist')]);
        //Delete Offer if it's Exist
        $offer -> delete();
            return redirect()->route('offers.show')->with(['success'=>__('messages.Offer Deleted Successfully')]);


    }

}
