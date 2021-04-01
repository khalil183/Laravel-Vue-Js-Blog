
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laravel-Vue Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend/css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

    <div id="app">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <router-link class="navbar-brand" to="/">Blog</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <router-link class="nav-link" to="/">Home
              <span class="sr-only"></span>
            </router-link>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

            <example-component></example-component>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
          <search-component></search-component>
            <category-component></category-component>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

</div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
