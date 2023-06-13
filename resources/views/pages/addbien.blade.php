@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Ajouter Les Biens</h1>
    <div class="row justify-content-center">
        <form class="row g-3" method="post" action="{{route('/addBiens')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label for="titre" class="form-label">Titre</label>
              <input type="text" value="{{old('titre')}}" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre">
              @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3">
              <label for="surface" class="form-label">Surface</label>
              <input type="number" value="{{old('surface')}}" class="form-control @error('surface') is-invalid @enderror" id="surface" name="surface">
              @error('surface')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" value="{{old('prix')}}" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix">
                @error('prix')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="comment" class="form-label">Description</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" name="comment">
                    {{old('comment')}}
                </textarea>
                @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="piece" class="form-label">Pieces</label>
                <input type="number" value="{{old('piece')}}" class="form-control @error('piece') is-invalid @enderror" id="piece" name="piece">
                @error('piece')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="chambre" class="form-label">Chambres</label>
                <input type="number" value="{{old('chambre')}}" class="form-control @error('chambre') is-invalid @enderror" id="chambre" name="chambre">
                @error('chambre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="addres" class="form-label">Adresses</label>
                <input type="text" value="{{old('addres')}}" class="form-control @error('addres') is-invalid @enderror" id="addres" name="addres">
                @error('addres')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" value="{{old('ville')}}" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville">
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
            <div class="col-md-6">
                <label for="file" class="form-label">Les differents Images du bien</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file[]" multiple>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
