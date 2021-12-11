<?php
 session_start(); 
   ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<?php
include 'db/dbutil.php';
 include 'topbar.php';  ?>
<style>
  table,td,tr,th{
    font-family: 'Josefin Sans', sans-serif;
  }
</style>
<body>
<div class="container p-3">
  <div class="row">
  <div class="col-lg-8">
       <div class="table-responsive   ">
<table id="example" class=" rounded-lg nowrap table table-striped table-sm table-bordered "   >
     <thead>
       <th>Action</th>  
      <th>Attachment</th>
      <th>Stage</th>
      <th>Ticket_Id</th>
        </thead>
        </thead>
        <tbody>
           
          <?php
        if (isset($_SESSION['Teacher'])) {
        $type=$_SESSION['Teacher'];
          $sql="SELECT * FROM `complaints` WHERE `category`='subject'";
          
        }else{
          
          $sql="SELECT * FROM `complaints` WHERE `category`='admin'";
        }
          $db=new dbutil();
          $res=$db->queryRequest($sql);
          if(!$res){

          }else{
          while ($row=$res->fetch_assoc()) { 
          echo'<tr>';
            if ($row['stage']!='Closed') {
          echo ' <td class="text-center"><a href="read_message.php?op=edit" class="nav-link active" >Edit</td>
          ';
}else{
  echo '<td class="text-center"><b>Not allowed</b></td>';
}
if ($row['attachment']) {
            echo "<td>";
            echo "<a class='text-info' href='../attachments/".$row['attachment']."'  p-2 text-white text-center' download>".$row['attachment'];
            echo "</a></td>";  
}else{
              echo "<td>";
            echo "<a class='text-center'>------</a>";
            echo "</td>";
}


            echo "<td>";
            if ($row['stage']=="Attended") {
            echo "<a class='badge badge-info p-2 text-white text-center'>".$row['stage'];
            }else if ($row['stage']=="Closed") {
            echo "<a class='badge badge-danger p-2 text-white text-center'>".$row['stage'];
              
            }else if ($row['stage']=="Pending") {
            echo "<a class='badge badge-warning p-2 badge-pill text-dark text-center'>".$row['stage'];
              
            }
            echo "</td>";
             echo "<td>";
            echo "<a class='alert-link' href='../read_details.php?id=".$row['tkt_id']."'>".$row['tkt_id']."</a>";
            echo "</td>";
            echo "</tr>";
          
             ?>
        </tbody>
    </table>
  </div>

   </div>

   <?php
    if (isset($_GET['op'])) {
   $var=$_GET['op'];
    if ($var=='edit') {
     ?>
   <div class="col-lg-4">
       <img class="col-lg-auto" src="../im/admin.gif">
    <form class="form-group p-3" method="post" action="edit-tkt.php">
          <label for="tktid">Ticket ID</label>
          <input type="text" class="form-control bg-white" name="tktid" value="<?php  echo $row['tkt_id'] ?>" readonly>
    <div class="form-group">
            <label for="category">Category</label>
          <input type="text" class="form-control bg-white" name="category" value="<?php echo $row['category']; ?>" readonly>
          </div>
        <div class="form-group">
            <label for="resolution">Resolution</label>
          <textarea class="form-control bg-white" rows="10" cols="5" id="editor" name="resel" ></textarea>
          </div>
          
  <div class="form-group">
    <select class="form-control" name="stage">
      <option>----Select----</option>
      <option>Pending</option>
      <option value="Closed">Close</option>
    </select>
          </div>
      <div class="modal-footer">
    <input class="btn btn-primary" type="submit" name="submit" value="submit">
      </div>
        </form>
      </div>

 </div>
    

<?php
}
   }
       
   }
   }  ?>
 </div>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script >
  $(function(){
    $("#example").DataTable({
 
    });
  });
</script>
</body>
</html>