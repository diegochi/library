<!-- index.blade.php -->
@extends('master')
@section('content')
  <div class="container">
    <p class="h3">Categories</p>
    <table class="table table-striped table-responsive" id="table-categories">
      <thead>
        <tr>
          <th>ID</th><th>Name</th><th>Description</th><th>Quantity</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr class="category-data" data-category-name="{{$category->name}}">
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
          <td>{{$category->description}}</td>
          <td>{{$category->quantity}}</td>
          <td>
            <a href="{{action('CategoriesController@edit', $category->id)}}" class="btn btn-info" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
            <form action="{{action('CategoriesController@destroy', $category->id)}}" style="display:inline-block" method="post">
              {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE" />
              <button class="btn btn-danger delete-category" title="Delete" type="submit"><i class="glyphicon glyphicon-erase"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr><td colspan="5">{{$categories->links()}}</td></tr>
      </tfoot>
    </table>
  </div>
@endsection