<!-- search.blade.php -->
@extends('master', ['search' => $search])
@section('content')
  <div class="container">
    <p class="h3">Books</p>
    <table class="table table-striped table-responsive" id="table-books">
      <thead>
        <tr>
          <th>ID</th><th>Name</th><th>Author</th><th>Category</th><th>Published</th><th>Available</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($foundbooks as $book)
        <tr class="book-data" data-book-name="{{$book->name}}" data-book-author="{{$book->author}}">
          <td>{{$book->id}}</td>
          <td>{{$book->name}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->category}}</td>
          <td>{{$book->published_date->format('m/d/Y')}}</td>
          <td>
            {{$book->available}}
            <a class="btn btn-secondary change-available-status" data-book-id="{{$book->id}}" data-target="#modal-available-{{$book->id}}" data-toggle="modal" title="Change status"><i class="glyphicon glyphicon-cog"></i></a>
            <div class="modal fade" id="modal-available-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change status of availability</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" class="ajax change-book-status" id="change-book-status-{{$book->id}}" method="post">
                    <div class="modal-body">
                      {{csrf_field()}}
                      <input name="id" type="hidden" value="{{$book->id}}" />
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="col-form-label">Available</label>
                          <div class="form-control">
                            <label class="radio-inline" for="availabley-{{$book->id}}"><input {{$book->available == 'Y' ? 'checked' : ''}} class="available" id="availabley-{{$book->id}}" name="available" required="required" type="radio" value="Y" /> Yes</label>
                            <label class="radio-inline" for="availableyn-{{$book->id}}"><input {{$book->available == 'N' ? 'checked' : ''}} class="available" id="availableyn-{{$book->id}}" name="available" required="required" type="radio" value="N" /> No</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6 input-user {{empty($book->user)?'hidden':''}}">
                          <label class="col-form-label" for="user-{{$book->id}}">User</label>
                          <input class="form-control" id="user-{{$book->id}}" name="user" required="required" type="text" value="{{$book->user}}" />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                      <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </td>
          <td>
            <a href="{{action('BooksController@edit', $book->id)}}" class="btn btn-info" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
            <form action="{{action('BooksController@destroy', $book->id)}}" style="display:inline-block" method="post">
              {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE" />
              <button class="btn btn-danger delete-book" title="Delete" type="button"><i class="glyphicon glyphicon-erase"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr><td colspan="7">{{$notfoundmsg}}{{$foundbooks->links()}}</td></tr>
      </tfoot>
    </table>
  </div>
@endsection