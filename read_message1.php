<?php session_start(); 
 if (isset($_GET["id"])) {  
include 'db/dbutil.php';
     $uid=$_SESSION["userID"];
     $tid=$_GET["id"];
    $db=new dbutil();
    $sl="UPDATE `complaints` SET `status`='Seen'  WHERE `userid`='$uid' AND `tkt_id`='$tid' ";
    $res=$db->queryRequest($sl);
  }
      ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<?php include 'topbar.php';  ?>
<style>
  table,td,tr,th{
    font-family: 'Josefin Sans', sans-serif;

  }
</style>
<body>
  <div class="container">
    <div class="row">
          <div class="col-lg-6">
      <img src="im/queries.jpg" class="col-lg-auto">
      
      </div>
        <div class="col-lg-6 pt-3">
          <table class="table  table-bordered" id="example">
            <thead>
              <th>Tkt_id</th>
              <th>Status</th> 
            </thead>
            <tbody>
        <?php
    require_once('db/dbutil.php');
        $db = new DButil();
        $uid=$_SESSION["userID"];
        $query="SELECT * FROM `complaints` WHERE `userid`='$uid'";
        $res= $db->queryRequest($query);
        while ($row=$res->fetch_assoc())  {
         
echo "<tr>";
          echo "<td ><a class='alert-link text-primary  ' target='_blank' href='read_details.php?id=".htmlentities($row["tkt_id"])."'>#".$row["tkt_id"]."</a></td>";
          if ($row["stage"]=="Escalated") {
            echo "<td><button class='btn btn-danger'>".$row["stage"]."</button></td>";
          }elseif ($row["stage"]=="Attended") {
            echo "<td><button class='btn btn-wraning'>".$row["stage"]."</button></td>";
            # code...
          }elseif ($row["stage"]=="Pending") {
            echo "<td><button class='btn btn-info'>".$row["stage"]."</button></td>";
            
          }elseif ($row["stage"]=="Closed") {
            # code...
            echo "<td><button class='btn btn-success'>".$row["stage"]."</button></td>";

          }
        }
        
        ?>
            </tbody>
          </table>
        </div>
    
      </div>
    </div>
    
  </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
  <script >
  $(function(){
    $("#example").DataTable();
  });
</script>


</body>

</html>