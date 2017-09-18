<!-- create.blade.php -->
@extends('master')
@section('content')
<div class="container">
  <p class="h3">Create book</p>
  <form action="{{url('books')}}" class="create-edit-book" method="post">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="name">Name</label>
        <input class="form-control" id="name" name="name" required="required" type="text" />
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label" for="author">Author</label>
        <input class="form-control" id="author" name="author" required="required" type="text" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="category">Category</label>
        <select class="form-control btstrpchsn" id="category" name="category" required="required">
          <option></option>
          @foreach($categories as $category)
           <option value="{{$category['id']}}">{{$category['name']}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="published" class="col-form-label">Published date</label>
        <input class="form-control btstrpdtpckr" id="published" name="published" readonly="readonly" required="required" type="text" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label">Available</label>
        <div class="form-control">
          <label class="radio-inline" for="availabley"><input class="available" checked="checked" id="availabley" name="available" required="required" type="radio" value="Y" /> Yes</label>
          <label class="radio-inline" for="availableyn"><input class="available" id="availableyn" name="available" required="required" type="radio" value="N" /> No</label>
        </div>
      </div>
      <div class="form-group col-md-6" id="input-user"></div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <div class="text-center">
          <button class="btn btn-primary" type="submit">Save</button>
          <button class="btn btn-secondary" onclick="window.location.href='{{url('books')}}'" type="button">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection