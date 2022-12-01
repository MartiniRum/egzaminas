@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <div class="card col-md-10  bg-warning bg-opacity-10">
                <div class="card-header bg-danger bg-opacity-90 m-3 rounded text-center fs-3">Knygos pasiūloje
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Santrauka</th>
                            <th>ISBN</th>
                            <th>Nuotrauka</th>
                            <th>Puslapių sk.</th>
                            <th>kategorija</th>
                            <th>Rezervacija</th>
                            @if(isset(Auth::user()->type) && Auth::user()->type == 'administratorius')
                                <th colspan="2"><a class="btn btn-warning opacity-75  float-end "
                                                   href="{{ route('books.create') }}">Pridėti knygą</a></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td class="pe-5">{{ $book->name }}</td>
                                <td>{{ $book->summary }}</td>
                                <td>{{ $book->ISBN }}</td>
                                <td>{{ $book->image }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->category }}</td>
                                @if(isset(Auth::user()->type) && Auth::user()->type == 'administratorius')
                                    <td class=" w-50"><a class="btn btn-success d-flex m-0 float-end"
                                                         href="{{ route('books.edit', $book->id) }}">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form class="" action="{{ route('books.destroy', $book->id) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-dark fw-bold">X
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
