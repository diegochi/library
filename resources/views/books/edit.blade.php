<!-- edit.blade.php -->
@extends('master')
@section('content')
<div class="container">
  <p class="h3">Edit book</p>
  <form action="{{action('BooksController@update', $id)}}" class="create-edit-book" method="post">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH" />
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="name">Name</label>
        <input class="form-control" id="name" name="name" required="required" type="text" value="{{$book->name}}" />
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label" for="author">Author</label>
        <input class="form-control" id="author" name="author" required="required" type="text" value="{{$book->author}}" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="category">Category</label>
        <select class="form-control btstrpchsn" id="category" name="category" required="required">
          <option></option>
          @foreach($categories as $category)
           <option value="{{$category['id']}}"{{($category['id'] == $book->category)?' selected':''}}>{{$category['name']}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="published" class="col-form-label">Published date</label>
        <input class="form-control btstrpdtpckr" id="published" name="published" readonly="readonly" required="required" type="text" value="{{$published}}" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label">Available</label>
        <div class="form-control">
          <label class="radio-inline" for="availabley"><input {{$book->available == 'Y' ? 'checked' : ''}} class="available" id="availabley" name="available" required="required" type="radio" value="Y" /> Yes</label>
          <label class="radio-inline" for="availableyn"><input {{$book->available == 'N' ? 'checked' : ''}} class="available" id="availableyn" name="available" required="required" type="radio" value="N" /> No</label>
        </div>
      </div>
      <div class="form-group col-md-6" id="input-user">{!! empty($book->user) ? '' : '<label class="col-form-label" for="user">User</label><input class="form-control" id="user" name="user" required="required" type="text" value="' . $book->user . '" />' !!}</div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <div class="text-center">
          <button class="btn btn-primary" type="submit">Update</button>
          <button class="btn btn-secondary" onclick="window.location.href='{{url('books')}}'" type="button">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection