<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/push.min.js"></script>
  <script type="text/javascript" src="js/serviceWorker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.min.css">
  <title></title>
<link rel="stylesheet" type="text/css" href="css/progress.css">
</head>
<body>
 <div class="container py-5">
  <div class="row">

    <!-- For demo purpose -->
    <div class="col-lg-12 mx-auto mb-5 text-white text-center">
      <h1 class="display-4">Bootstrap 4 circular progress bar</h1>
      <p class="lead mb-0">Pure CSS solution to create a circular progress bar compatible with Bootstrap 4. </p>
      <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-white">
                <u>Bootstrapious</u></a>
      </p>
    </div>
    <!-- END -->

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Overall progress</h2>

        <!-- Progress bar 1 -->
        <div class="progress mx-auto" data-value='30'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">8<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
          </div>
        </div>
        <!-- END -->
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Work hours</h2>

        <!-- Progress bar 2 -->
        <div class="progress mx-auto" data-value='50'>
          <span class="progress-left">
                        <span class="progress-bar border-danger"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-danger"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold"><sup class="small">25%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info-->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
          </div>
        </div>
        <!-- END -->
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Server time</h2>

        <!-- Progress bar 3 -->
        <div class="progress mx-auto" data-value='76'>
          <span class="progress-left">
                        <span class="progress-bar border-success"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-success"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">76<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
          </div>
        </div>
        <!-- END -->
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Total overdue</h2>

        <!-- Progress bar 4 -->
        <div class="progress mx-auto" data-value='12'>
          <span class="progress-left">
                        <span class="progress-bar border-warning"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">12<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
          </div>
        </div>
        <!-- END -->
      </div>
    </div>
  </div>
</div>
<script >
  $(function() {
    setTimeout(function(){


  $(".progress").each(function() {
    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)' )
      }
    }

  })

  function percentageToDegrees(arg) {

    return arg / 100 * 360;

  }
    },6000)

});
</script>
</body>
</html>