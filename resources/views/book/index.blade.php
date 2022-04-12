@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            @include('inc.message')
        </div>
        <div class="container">
            <form action="{{route('book.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('photo') border-danger @enderror" placeholder="Book Name" aria-label="Book Name" aria-describedby="basic-addon2"
                    name="book_name">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Button</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Action</th>
                 
                  </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$book->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-warning">Edit</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </td>
                        
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
