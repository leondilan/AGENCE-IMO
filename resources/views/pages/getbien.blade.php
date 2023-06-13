@extends('welcome')

@section('content')
    <?php $a=true ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($images as $image)
                            <div class="carousel-item <?= $a===true? 'active':null ?>">
                                <img src="{{asset('imagesBiens/'.$image->nomImage)}}" class="d-block w-100">
                            </div>
                            <?php $a=false ?>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <h1>{{$biens->titre}}</h1>
                <p class="fs-5">
                    {{$biens->piece}} pièces - {{$biens->surface}} m<sup>2</sup>
                </p>
                <p class="display-6 text-primary">{{$biens->prix}} FCFA</p>
                <hr>
                <p class="fs-5 fw-bold">{{__('messages.interest')}}?</p>
                <form class="row g-3" action="{{route('/getBien',['id'=>$biens->id])}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                      <label for="prenom" class="form-label">{{__('messages.prenom')}}</label>
                      <input value="{{old('prenom')}}" type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom">
                        @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="nom" class="form-label">{{__('messages.nom')}}</label>
                      <input value="{{old('nom')}}" type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tel" class="form-label">{{__('messages.tel')}}</label>
                        <input type="tel" value="{{old('tel')}}" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel">
                        @error('tel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">{{__('messages.email')}}</label>
                        <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="comment" class="form-label">{{__('messages.comment')}}</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" name="comment">
                            {{old('comment')}}
                        </textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">{{__('messages.contact')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <p class="fw-bold fs-2">{{__("messages.caract")}}</p>
            <div class="col-md-8">
                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td class="fw-bold">{{__("messages.surface")}}</td>
                        <td>{{$biens->surface}} m<sup>2</sup></td>
                      </tr>
                      <tr>
                        <td class="fw-bold">{{__("messages.piece")}}</td>
                        <td>{{$biens->piece}}</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">{{__("messages.chambre")}}</td>
                        <td>{{$biens->chambre}}</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">{{__("messages.ville")}}</td>
                        <td>{{$biens->ville}}</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">{{__("messages.addres")}}</td>
                        <td>{{$biens->addresses}}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <p class="fw-bold fs-2">{{__("messages.spece")}}</p>
                <ul class="list-group">
                    @foreach ($options as $option)
                        <li class="list-group-item">{{$option->nomOption}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
