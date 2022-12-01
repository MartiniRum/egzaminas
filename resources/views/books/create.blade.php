@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <div class="card col-md-10 bg-warning bg-opacity-10">
                <div class="card-header bg-danger bg-opacity-90 m-3 rounded text-center fs-3">Pridėti maršrutą</div>
                <div class="card-body">

                    <form action="{{ route('books.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nuotrauka</label>
                            <input class="form-control" type="text" name="image" value="{{old('image')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Santrauka</label>
                            <input class="form-control" type="text"
                                   name="summary" value="{{old('summary')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input class="form-control " type="text" name="ISBN"
                                   value="{{old('ISBN')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Puslapių skaičius</label>
                            <input class="form-control " type="number" name="pages"
                                   value="{{old('pages')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">kategorija</label>
                            <input class="form-control " type="text" name="category"
                                   value="{{old('category')}}">
                        </div>
                        <button class="btn btn-danger">Pridėti</button>
                        <a class="btn btn-warning mx-3 float-end" href="{{ route('books.index') }}">Atgal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
