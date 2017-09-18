<!-- edit.blade.php -->
@extends('master')
@section('content')
<div class="container">
  <p class="h3">Edit category</p>
  <form action="{{action('CategoriesController@update', $id)}}" class="create-edit-category" method="post">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH" />
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="name">Name</label>
        <input class="form-control" id="name" name="name" required="required" type="text" value="{{$category->name}}" />
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label" for="description">Description</label>
        <input class="form-control" id="description" name="description" required="required" type="text" value="{{$category->description}}" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <div class="text-center">
          <button class="btn btn-primary" type="submit">Update</button>
          <button class="btn btn-secondary" onclick="window.location.href='{{url('categories')}}'" type="button">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection