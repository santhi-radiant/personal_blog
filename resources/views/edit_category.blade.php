<html>
    <head>
        <head>
            <title>Edit Category</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
          background-color: #f1f1f1;
          height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
          }
          .row.content {height: auto;}
        }
      </style>
    </head>
    <body>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <h4>Santhi's Blog</h4>
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/">Home</a></li>
            <li class="active"><a href="/article">Create Articles</a>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="/categories">Manage Categories</a></li>
                    <li class="active"><a href="/tags">Manage Tags</a></li>
                </ul>
            </li >
            <li class="active"><a href="/about">About me</a></li>

          </ul><br>


        </div>
        <div class="col-sm-9">



<div class="panel-heading">
    <h2>Edit Categories</h2>
</div>

<div class="panel-body">
    <form method="POST"  action="/update_category/{{$category[0]->id}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="category" class="form-control" value="{{$category[0]->category}}">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{$message}}</strong>
            </div>
         @endif
    </form>
</div>


</div>
</div>
</div>

<footer class="container-fluid">
  <p>Copy Rights 2022</p>
</footer>

</body>
</html>

