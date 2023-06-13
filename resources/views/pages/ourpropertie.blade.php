@extends('welcome')

@section('content')
    <div class="container">
        <p class="display-6">{{__('messages.all')}}</p>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('/getBien',['id'=>$image->biens->id])}}" style="all: unset">
                        <div class="card mb-3">
                            <img src="https://placehold.co/100x60" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">{{$image->biens->titre}}</h5>
                            <p class="card-text">
                                <span>
                                    {{$image->biens->surface}}m<sup>2</sup> - {{substr($image->biens->ville, 0, 20)}}
                                </span> <br><br>
                                <span class="fw-bold">{{$image->biens->prix}}</span> FCFA
                            </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{$images->links()}}
        </div>
    </div>
@endsection
