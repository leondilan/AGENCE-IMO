@extends('welcome')

@section('content')

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">{{__('messages.title')}}</h1>
            <p class="lead">
                {{__('messages.slogan')}}
            </p>
        </div>
    </div>
    <div class="container mt-5">
        <p class="display-6">{{__('messages.last')}}</p>
        <div class="row">
            @foreach ($immos as $immo)
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('/getBien',['id'=>$immo->biens->id])}}" style="all: unset">
                        <div class="card mb-3">
                            <img src="https://placehold.co/100x60" class="card-img-top">
                            <div class="card-body">
                              <h5 class="card-title fw-bold">{{$immo->biens->titre}}</h5>
                              <p class="card-text">
                                <span>
                                    {{$immo->biens->surface}}m<sup>2</sup> - {{substr($immo->biens->ville, 0, 20)}}
                                </span> <br><br>
                                <span class="fw-bold">{{$immo->biens->prix}}</span> FCFA
                              </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection