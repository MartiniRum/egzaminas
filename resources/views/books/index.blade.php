@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <div class="card col-md-10  bg-warning bg-opacity-10">
                <div class="card-header bg-danger bg-opacity-90 m-3 rounded text-center fs-3">Knygos pasiūloje
                </div>
                <div class="card-body">
                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th class="pe-5 ">Nuotrauka</th>
                            <th class="pe-5 ">Pavadinimas</th>
                            <th class="pe-5 ">Santrauka</th>
                            <th class="pe-5 ">ISBN</th>
                            <th class="pe-5 ">Puslapių skaičius</th>
                            <th class="pe-5 ">kategorija</th>
                            <th class="pe-5">Rezervacija</th>
                            <th class="pe-5"></th>

                            @if(isset(Auth::user()->type) && Auth::user()->type == 'Administratorius')
                                <th><a class="btn btn-warning opacity-75  float-end "
                                       href="{{ route('books.create') }}">Pridėti knygą</a></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                                    <tr>
                                        <td>{{ $book->image }}</td>
                                        <td class="pe-5">{{ $book->name }}</td>
                                        <td>{{ $book->summary }}</td>
                                        <td>{{ $book->ISBN }}</td>
                                        <td>{{ $book->pages }}</td>
                                        <td>{{ $book->category }}</td>
                                        <td>
                                            <form class="" action="{{ route('reserves.store', $book->id) }}"
                                                  method="post">
                                                @csrf
                                                <input class="form-control visually-hidden" type="text" name="user_id"
                                                       value="{{Auth::user()->id}}">
                                                <input class="form-control visually-hidden" type="text" name="book_id"
                                                       value="{{$book->id}}">
                                                <button class="btn bg-opacity-100 fw-bold text-success">Rezervuoti
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form class="" action="{{ route('likes.store', $book->id) }}"
                                                  method="post">
                                                @csrf
                                                <input class="form-control visually-hidden" type="text" name="user_id"
                                                       value="{{Auth::user()->id}}">
                                                <input class="form-control visually-hidden" type="text" name="book_id"
                                                       value="{{$book->id}}">
                                                <button class="btn bg-opacity-100 fw-bold fs-1 text-danger">♥
                                                </button>
                                            </form>
                                        </td>
                                        @if(isset(Auth::user()->type) && Auth::user()->type == 'Administratorius')
                                            <td colspan="2" class=" w-50"><a
                                                    class="btn btn-success d-flex m-0 float-end"
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
