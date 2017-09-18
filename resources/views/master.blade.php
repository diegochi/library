<!-- master.blade.php -->
<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0,width=device-width" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    <title>The Library</title>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header"><a class="navbar-brand">The Library</a></div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="/books">Books</a></li>
            <li><a href="/books/create">New book</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/categories/create">New category</a></li>
          </ul>
          <form action="/books/search" class="navbar-form navbar-left search-books" method="post">
            {{csrf_field()}}
            <div class="form-group"><input class="form-control" name="search" placeholder="Search book..." required="required" type="text" value="{{$search or ''}}" /></div>
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </form>
        </div>
      </div>
    </nav>
    @yield('content')
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
  </body>
</html>