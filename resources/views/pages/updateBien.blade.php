@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Editer le bien "{{$bien->titre}}"</h1>
    <form method="post" action="{{route('/updatebien',['id'=>$bien->id])}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" value="{{$bien->titre}}" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre">
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-3">
                    <label for="surface" class="form-label">Surface</label>
                    <input type="number" value="{{$bien->surface}}" class="form-control @error('surface') is-invalid @enderror" id="surface" name="surface">
                    @error('surface')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" value="{{$bien->prix}}" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix">
                        @error('prix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="comment" class="form-label">Description</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" name="comment">
                            {{$bien->description}}
                        </textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="piece" class="form-label">Pieces</label>
                        <input type="number" value="{{$bien->piece}}" class="form-control @error('piece') is-invalid @enderror" id="piece" name="piece">
                        @error('piece')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="chambre" class="form-label">Chambres</label>
                        <input type="number" value="{{$bien->chambre}}" class="form-control @error('chambre') is-invalid @enderror" id="chambre" name="chambre">
                        @error('chambre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="addres" class="form-label">Adresses</label>
                        <input type="text" value="{{$bien->addresses}}" class="form-control @error('addres') is-invalid @enderror" id="addres" name="addres">
                        @error('addres')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" value="{{$bien->ville}}" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville">
                        @error('ville')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                    <label for="multiple-select-field" class="form-label">Options</label>
                    <select class="form-select @error('options') is-invalid @enderror" id="multiple-select-field" data-placeholder="Choisir les options" multiple name="options[]">
                        @foreach ($options as $option)
                            <option value="{{$option->id}}">{{$option->nomOption}}</option>
                        @endforeach
                    </select>
                        @error('options')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @foreach ($images as $image)
                    <div class="card mb-3">
                        <img src="{{asset('imagesBiens/'.$image->nomImage)}}" style="height: 100px">
                        <a href="{{route('/delImg',['id'=>$image->id])}}" class="btn bg-danger text-white">Supprimer</a>
                    </div>
                @endforeach
                <div class="mb-3">
                    <label for="formFile" class="form-label">Images Biens</label>
                    <input class="form-control" type="file" id="formFile" name="file[]" multiple>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
