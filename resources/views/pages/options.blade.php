@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <span class="display-6">Les Options</span>
                <a href="" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter une options</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NOM</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($options as $option)
                    <tr>
                      <td>{{$option->nomOption}}</td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#up{{$option->id}}" class="btn btn-primary">Editer</button>
                        <button data-bs-toggle="modal" data-bs-target="#{{$option->id}}" class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <div class="modal fade" id="{{$option->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>
                              Voulez vous vraiment supprimer la categorie <strong>{{$option->nomOption}}</strong>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="{{route('/delete',['id'=>$option->id])}}" class="btn btn-danger">Oui</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="up{{$option->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <form action="{{route('/update',['id'=>$option->id])}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">NOM</label>
                                    <input type="text" value="{{$option->nomOption}}" class="form-control" id="nom" name="nom">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Actualisé</button>
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
            </table>
            {{$options->links()}}
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Options</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('/manage-option') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">NOM</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection