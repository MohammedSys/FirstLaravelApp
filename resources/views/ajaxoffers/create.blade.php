@extends('ajaxoffers.layouts.master')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h3>{{__('messages.Add Offer')}}</h3>
            </div>

            <form method="POST" id="offerForm" action="">
                @csrf
                <div class="form-group">
                    <label for="Photo">Upload Image</label>
                    <input type="file" class="form-control" name="photo" id="Photo" aria-describedby="imageHelp" >
                    @error('photo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                    <input type="text" class="form-control" name="name_ar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                    <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Price')}}</label>
                    <input type="text" class="form-control" name="price" placeholder="{{__('messages.Offer Price')}}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Details')}}</label>
                    <input type="text" class="form-control" name="details_ar" placeholder="{{__('messages.Offer Details')}}">
                    @error('details_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Details')}}</label>
                    <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.Offer Details')}}">
                    @error('details_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button id="ajax-save" class="btn btn-primary">{{__('messages.Submit')}}</button>
            </form>
            <br>
            <div class="alert alert-success" id="success_msg" style="display: none;">
                <p>Data Saved Successfully</p>
            </div>
            <div class="alert alert-danger" id="danger_msg" style="display: none;">
                <p>Data has not been Saved</p>
            </div>
        </div>
    </div>
    </body>
    <script>
        $(document).on('click','#ajax-save',function (e) {
            e.preventDefault();
            let formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:'{{route('ajax.offer.store')}}',
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
                        $("#offerForm")[0].reset();
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
