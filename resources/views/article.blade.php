<html>
    <head>
        <title>Create New Article</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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

        <!-- Create Article  -->
            <div class="col-sm-9">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2>Create New Article</h2>
                            </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" action="/article">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                    Title<input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        Description<textarea name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            Categroy
                                            <select name="category" class="form-control">
                                                <option selected disabled>select category</option>
                                                @foreach ($category_list as $category )

                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                   Tags<select name="tags" class="form-control" >
                                                    <option selected disabled>select tag</option>
                                                    @foreach ($tags_list as  $tag)
                                                    <option value="{{$tag->id}}" >{{$tag->tag}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                    Photo <input type="file" name="image" class="form-control">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </div>
                                @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops! there are problems in uploading the image.</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

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
        </div>


        <footer class="container-fluid">
            <p>Copy Rights 2022</p>
          </footer>


    </body>
</html>
