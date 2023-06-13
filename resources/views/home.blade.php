@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <span class="display-6">Les Biens</span>
                <a href="{{route('/addBiens')}}" class="btn btn-primary float-end">Ajouter un bien</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">TITRE</th>
                    <th scope="col">SURFACE</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">VILLE</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($biens as $bien)
                        <tr>
                            <td>{{$bien->titre}}</td>
                            <td>{{$bien->surface}}m<sup>2</sup></td>
                            <td>{{$bien->prix}} FCFA</td>
                            <td>{{$bien->ville}}</td>
                            <td>
                                <a href="{{route('/updatebien',['id'=>$bien->id])}}" class="btn btn-primary">Editer</button>
                                <a data-bs-toggle="modal" data-bs-target="#{{$bien->id}}" class="btn btn-danger ms-3">Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="{{$bien->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <p>
                                    Voulez vous vraiment supprimer le bien <strong>{{$bien->titre}}</strong>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                  <a href="{{route('/deletebien',['id'=>$bien->id])}}" class="btn btn-danger">Oui</a>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{$biens->links()}}
        </div>
    </div>
</div>
@endsection
