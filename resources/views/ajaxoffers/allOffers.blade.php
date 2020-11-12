@extends('ajaxoffers.layouts.master')
@section('content')
    <div class="alert alert-success" id="success_msg" style="display: none;">
        Item Deleted Successfully
    </div>
    <div class="alert alert-success" id="success_msg" style="display: none;">
        <p>Data Saved Successfully</p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.Offer No')}}</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <th scope="col">{{__('messages.Price')}}</th>
            <th scope="col">{{__('messages.Offer Details')}}</th>
            <th scope="col">{{__('messages.Offer Picture')}}</th>
            <th scope="col">{{__('messages.Operation')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr class="offerRow{{$offer->id}}">
                {{--<th scope="row">{{$offer -> id}}</th>--}}
                <td>{{$offer -> id}}</td>
                <td>{{$offer -> name}}</td>
                <td>{{$offer -> price}}</td>
                <td>{{$offer -> details}}</td>
                <td><img src="{{asset('images/Offers/'. $offer -> photo)}}" width="100px" height="100px" alt="Image not found"></td>
                <td>
                    <a href="{{route('ajax.offers.edit',$offer->id)}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                    <a href="{{route('offers.delete',$offer->id)}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                    <a href="" offer_id="{{$offer->id}}" id="ajaxDeleteBtn" class="btn btn-danger">AjaxDelete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).on('click','#ajaxDeleteBtn',function (e) {
            e.preventDefault();
            let offer_id = $('#ajaxDeleteBtn').attr('offer_id');
            $.ajax({
                type:'post',
                url:"{{route('ajax.offer.delete')}}",
                data : {
                    '_token': '{{csrf_token()}}',
                    'id' : offer_id,
                },success: function (data) {
                    if(data.status == true){
                        //alert(data.msg)
                        $('#success_msg').show();
                    }else{
                        $('#danger_msg').show();
                    }
                    $('.offerRow'+data.id).remove();

                }, error: function (reject){

                }
            });
        });

    </script>
@stop
