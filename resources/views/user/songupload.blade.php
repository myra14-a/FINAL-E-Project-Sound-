
@extends('user.layout')
@section('content')

      
    <div class="container">
            <h2 class="text-center">songs upload</h2>
            <form action="/songupload" method="post" enctype="multipart/form-data">
                   @csrf
                  
                         <input type="text" name="songname" placeholder="Song Name" class="form-control">
                         <br>
                         <input type="text" name="artist"  placeholder="Artist" class="form-control">
                         <br>
                          <input type="file" name="image"  placeholder="Select image" class="form-control">
                         <br>
                         <input type="file" name="song"  placeholder="Select Song" class="form-control">
                         <br>
                          <input type="text" name="category"  placeholder="Category" class="form-control">
                         <br>
                           <button type="submit" class="site-btn">Upload</button>
                        </form>
                    </div>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
@endsection
