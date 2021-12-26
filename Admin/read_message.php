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
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

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
<div class="container p-2">
  <div class="row">
  <div class="col-lg-auto">
       <div class="table-responsive   ">
<table id="example" class="table table-bordered"   >
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
          while ($row=$res->fetch_assoc()) { 
          echo'<tr><td>';
          echo '<a href="../read_details.php?id='.$row['tkt_id'].' " class="nav-link active" >'.$row['tkt_id'].'</a>';
          echo'</td>';
                    echo'<td>';
          echo $row['attachment'];
          echo'</td>';
                    echo'<td>';
          echo $row['stage'];
          echo'</td>';
                    echo'<td>';
          echo '<a href="read_message.php?op=edit&&id='.$row['tkt_id'].' " class="nav-link active" >'.$row['tkt_id'].'</a>';
          echo'</td> </tr>';
      }

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
   <div class="col-lg-12">
       <img class="col-lg-auto" src="../im/admin.gif">
    <form class="form-group p-3" enctype="multipart/form-data" method="post" action="edit-tkt.php">
          <label for="tktid">Ticket ID</label>
          <input type="text" class="form-control bg-white" name="tktid" value="<?php  echo $_GET['id'] ?>" readonly>
    <div class="form-group">
            <label for="category">Category</label>
          <input type="text" class="form-control bg-white" name="category" value="<?php echo $row['category']; ?>" readonly>
          </div>
        <div class="form-group">
            <label for="resolution">Resolution</label>
          <textarea style="height: 200px;"  id="editor" rows="50" cols="50" name="resel" >
          </textarea>
          
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
       
     ?>
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
CKEDITOR.replace( 'editor',{
        height:300,
        filebrowserUploadUrl: './edit-tkt.php',
        filebrowserUploadMethod:'form'

});
</script>

</body>
</html>