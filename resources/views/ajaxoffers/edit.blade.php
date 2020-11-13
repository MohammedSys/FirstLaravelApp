@extends('ajaxoffers.layouts.master')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h3>Update Offer</h3>
            </div>

            <div class="alert alert-success" id="success_msg" style="display: none;">
                <p>Data Updated Successfully</p>
            </div>

            <form method="POST" id="offerFormUpdate" action="">
                @csrf
                <div class="form-group">
                    <label for="Photo">Upload Image</label>
                    <input type="file" class="form-control" name="photo" id="Photo" aria-describedby="imageHelp" >
                    @error('photo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <input type="text" style="display: none;" name="offer_id" value="{{$offer->id}}" >

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                    <input type="text" class="form-control" name="name_en" value="{{$offer->name_en}}" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Price')}}</label>
                    <input type="text" class="form-control" name="price" value="{{$offer->price}}" placeholder="{{__('messages.Offer Price')}}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Details')}}</label>
                    <input type="text" class="form-control" name="details_ar" value="{{$offer->details_ar}}" placeholder="{{__('messages.Offer Details')}}">
                    @error('details_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Details')}}</label>
                    <input type="text" class="form-control" name="details_en" value="{{$offer->details_ar}}" placeholder="{{__('messages.Offer Details')}}">
                    @error('details_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button id="ajax-update" class="btn btn-primary">{{__('messages.Submit')}}</button>
            </form>
            <br>
        </div>
    </div>
    <script>
        $(document).on('click','#ajax-update',function (e) {
            e.preventDefault();
            let formData = new FormData($('#offerFormUpdate')[0]);
            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:'{{route('ajax.offers.update')}}',
                /*data:{
                    '_token' : "{{csrf_token()}}",
                    'name_ar': $("input[name='name_ar']").val(),
                    'name_en': $("input[name='name_en']").val(),
                    'price': $("input[name='price']").val(),
                    'details_ar': $("input[name='details_ar']").val(),
                    'details_en': $("input[name='details_en']").val(),
                },*/
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    if(data.status == true){
                         //alert(data.msg)
                        $('#success_msg').show();
                        //$("#offerFormUpdate")[0].reset();
                    }else{
                        $('#danger_msg').show();
                    }

                },
                error: function (reject){

                }
            })
        });
    </script>
@stop
