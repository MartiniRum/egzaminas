@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <div class="card col-md-10 bg-warning bg-opacity-10">
                <div class="card-header bg-danger bg-opacity-90 m-3 rounded text-center fs-3">Redagavimas</div>
                <div class="card-body">
                    <form action="{{ route('books.update', $book->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nuotrauka</label>
                            <input class="form-control" type="text" name="image" value="{{ $book->image }}">
                        </div>
                        <div  class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input class="form-control " type="text" name="name" value="{{ $book->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Santrauka</label>
                            <input class="form-control" type="text" name="summary" value="{{ $book->summary }}">
                        </div>
                        <div  class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input class="form-control " type="text" name="ISBN" value="{{ $book->ISBN }}">
                        </div>
                        <div  class="mb-3">
                            <label class="form-label">Puslapių skaičius</label>
                            <input class="form-control " type="number" name="pages" value="{{ $book->pages }}">
                        </div>
                        <div  class="mb-3">
                            <label class="form-label">Kategorija</label>
                            <input class="form-control " type="text" name="category" value="{{ $book->category }}">
                        </div>

                        <button class="btn btn-danger">Išsaugoti</button>
                        <a class="btn btn-warning mx-3 float-end" href="{{ route('books.index') }}">Atgal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
