<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
<!-- As a heading -->

<div class="cover-container navbar-dark bg-dark text-light d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">STUDENT PROFILE SYSTEM</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link active" aria-current="page" href="">Home</a>
        </nav>
      </div>
    </header>
  </div>

  <div class="container bg-dark p-4 col-4 text-center text-light mt-5">
    <main class="form-signin ">
      <form action="./first-login-transfer.php" method="post">
        <h1 class="h3 mb-3 fw-normal">ADMIN</h1>

        <div class="form-floating p-2">
          <input type="email" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
          <label class="text-dark" for="floatingInput">Email address</label>
        </div>

        <div class="form-floating p-2">
          <input type="password" class="form-control" name="userpass" id="floatingPassword" placeholder="Password">
          <label class="text-dark" for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
      </form>

    </main>
  </div>




<?php include("./components/footer.inc.php"); ?>
