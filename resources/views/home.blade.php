
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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

      <h1><strong>List of Articles</strong></h1>

<table class="table">
    <tr style="background-color:lavenderblush">
    <td>Title</td>
    <td>Description</td>
    <td>Tags and Categories</td>
    <td>Delete</td>
    </tr>

@foreach ($articles as $article )
<tr>
<td>
      <h4>{{$article->title}}</h4>
      <h6><span class="glyphicon glyphicon-time"></span>Posted by Santhi  {{$article->updated_at}}</h6>
</td>
<td>
    <p><h5> {{$article->description}}</h5><br>
        <img src="{{asset('images/'.$article->image)}}" width="100px" height="100px" alt="{{$article->title}}"> <br>
          <br><br>
    </td>
    <td>
        @foreach ($article->tags as $tag )

          <h5><span class="label label-danger">{{$tag->tag}}&nbsp;</span> </h5>

        @endforeach

        @foreach ($article->categories as $category)
        <h5><span class="label label-primary"> {{$category->category}}&nbsp;</span></h5><br>
        @endforeach
    </td>
    <td>
        <a href="delete_article/{{$article->id}}">Delete</a>
    </td>
    </tr>
@endforeach

</table>
      </div>
    </div>
  </div>


<footer class="container-fluid">
  <p>Copy Rights 2022</p>
</footer>

</body>
</html>

