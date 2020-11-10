<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <!--Start Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('offers.show')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <ul>
                     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ " || " .$properties['native']." || " }}
                            </a>
                    @endforeach
                </ul>
            </ul>
        </div>
    </nav>
    <!--End Navbar-->
        <div class="flex-center position-ref full-height">
        <div class="content">
                <div class="title m-b-md">
                    <h3>{{__('messages.Update Offer')}}</h3>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="POST" action="{{route('offers.update',$offer->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                        <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name ar')}}">
                        @error('name_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                        <input type="text" class="form-control" name="name_en" value="{{$offer->name_en}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name en')}}">
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
                        <input type="text" class="form-control" name="details_ar" value="{{$offer->details_ar }}" placeholder="{{__('messages.Offer Details ar')}}">
                        @error('details_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('messages.Offer Details')}}</label>
                        <input type="text" class="form-control" name="details_en" value="{{$offer->details_en }}" placeholder="{{__('messages.Offer Details en')}}">
                        @error('details_en')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('messages.Update')}}</button>
                </form>
        </div>
        </div>
    </body>
</html>
