  <?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin dashboard</title>
  </head>
  <body>
  <?php include '../navigation.php' ?>
  <div class="container-fluid">
  <h3>Hello, <?php echo $_SESSION['admin']; ?></h3>

    <div class="row">
    </div>
  <div class="row p-3">
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Students</b></p>
    </div>
  </div>
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Teachers</b></p>
    </div>
  </div>
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Tickets</b></p>
    </div>
  </div>
  </div>
  <div class="row">
    </div>
  <div class="row p-3">
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Students</b></p>
    </div>
  </div>
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Teachers</b></p>
    </div>
  </div>
  <div class="card bg-dark bg-gradient p-0 shadow m-2 " style="width: 14rem;">
    <div class="card-img-top  p-5 " >
    </div>
    <div class="card-body">
      <p class="card-text text-white"><b>Tickets</b></p>
    </div>
  </div>
  </div>
  
  </div>

  </body>
  </html>