<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
       
<div class="container">
    <h1 class="text-center w-100 m-2 text-primary">Admin</h1>
    <table class="table table-dark table-hover">
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Reason</th>
        <th>Comment</th>
    </tr>
</thead>
<tbody>
    @foreach($allusers as $user)
   <tr>
     <td>{{ $user->name}}</td>
     <td>{{ $user->email}}</td>
      <td>{{ $user->reason}}</td>
       <td>{{ $user->comment}}</td>
   </tr>
   @endforeach
</tbody>
    </table>
</div>

    
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
