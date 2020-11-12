<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use LaravelLocalization;

class AjaxOfferController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::select(
            'id',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details',
            'photo',
            'price'
            )->get();
        return view('ajaxoffers.allOffers',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajaxoffers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
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
        $offer = Offer::create([
            'photo' => $file_name,
            'name_en' => $request -> name_en,
            'name_ar' => $request -> name_ar,
            'price' => $request -> price,
            'details_ar' => $request -> details_ar,
            'details_en' => $request -> details_en,

        ]);
        //return redirect()->back()->with(['success'=>__('messages.Record added Successfully')]);
        if ($offer)
            /*return json_encode(array('statusCode'=>200));*/
        return response() -> json([
            'status'=> true,
            'msg' => 'Data has been saved',
            'data' => '',
        ]);
        else
            return response() -> json([
                'status'=> false,
                'msg' => 'Data has not been saved',
                'data' => '',
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //return $request;
        #############
        $offer =  Offer::find($request->id);
        if(!$offer)
            return redirect()->back()->with(['error' => __('messages.Offer is not Exist')]);
        //Delete Offer if it's Exist
        $offer -> delete();
        return response()->json([
                'status' => true,
                'msg' => 'Item Deleted Successfully',
                'id' => $request -> id,
            ]);

    }

}
