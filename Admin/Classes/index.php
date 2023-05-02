<?php include('../../Common files/db/dbutil.php'); 
$db=new dbutil();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Allocation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/datatables.min.css" rel="stylesheet"/>
 <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/datatables.min.js"></script>
</head>
<body>

    <?php include('../navigation.php'); ?>
<div class='container-fluid'>
    <div class="row m-5">
        <div class="col-lg-8">
        <table class="table table-stripped border" id="datagrid">
        <thead>
        <th>Subject_id</th>
        <th>Subject_name</th>
        <th>Semester</th>
        <th>Combination</th>
        <th>Teacher</th>

        </thead>
        <tbody>
        <?php
        $sql="SELECT * FROM `subjects`";
        $res=$db->queryRequest($sql);
        while($row=$res->fetch_assoc()){
       echo"<tr><td>".$row['subject_code']."</td><td>".$row['subject_name']."</td><td>".$row['semester']."</td><td>".$row['combination']."</td>";
       if($row['Teacher']){
           echo "<td>".$row['Teacher']."</td>";
       }else{
           echo"<td><button data-bs-toggle='modal' data-bs-target='#staticBackdrop".$row['subject_code']."' class='btn btn-sm btn-secondary'>Add teacher</button></td></tr>";
       }
?>
<div class="modal fade" id="staticBackdrop<?php echo $row['subject_code']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $row['subject_code']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
        <select class="form-control" name="department" id="department<?php echo $row['subject_code']; ?>" id-for="<?php echo $row['subject_code']; ?>" >
        <option>--select-Department---</option>
        <
        <?php
         $sql_2="SELECT DISTINCT `Department` FROM `admin`";
          $res_2=$db->queryRequest($sql_2);
          while($row_2=$res_2->fetch_assoc()){
              if($row_2['Department']!='admin'){
                echo"<option value='".$row_2['Department']."'>".$row_2['Department']."</option>";
        ?>

<?php              }
          }

        ?>
        </select>
        </div>
        <div class="form-group" >
        <select class="form-control" id="<?php echo $row['subject_code']; ?>" t-id="<?php echo $row['subject_code']; ?>" >

        </select>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="javascript:void(0)" class="btn btn-primary hidden" id="save<?php echo $row['subject_code']; ?>" disabled="true">Save</a>
      </div>
      
    </div>
  </div>
</div>
      <?php  }
        ?>
     

        </tbody>

        </table>
        </div>
        
</div>
<script>

$(document).ready(function () {
  
    $('#datagrid').DataTable({
                dom: 'Bfrtip',
        buttons: [
            'excel', 'csv', 'copy', 'pdf', 'print'
        ]

    });



$('select[id-for]').change(function(){
    let tid=$(this).attr('id-for')
    let department=$(`#${this.id} option:selected`).val()
 if(department=="--select-Department---"){
         $(`#save${tid}`).attr('href','javascript:void(0)')
        $(`#${tid}`).html('<option value="--select--teacher--">--select--teacher--</option>')

     alert('please select the value')
 }else{
$.ajax({
    url:'./ajax.php',
    method:'GET',
    async: true,
    data:{'department':department},
    success:e=>{
        let res=JSON.parse(e);
        $(`#${tid}`).html('<option value="--select--teacher--">--select--teacher--</option>')
        for (let i=0; i<res.Teachers.length; i++){
            $(`#${tid}`).append(`<option value='${res.Teachers[i]}'>${res.Teachers[i]}</option>`)
        }
        
    }
})
 
     }
    
})
$('select[t-id]').change(function(){
    let tid=$(this).attr('t-id')
             let teacher=$(`#${this.id} option:selected`).val()
             console.log(teacher)
             if(teacher=="--select--teacher--"){
                 alert('please select the value')
                    $(`#save${tid}`).attr('href','javascript:void(0)')

             }else{
                    $.ajax({
                 url:'./ajax.php',
                       async: true,
                 method:'POST',
                 data:{'subject_id':tid,'teacher':teacher},
                success:e=>{
                    console.log(JSON.parse(e))
                    $(`#save${tid}`).attr('href','./')
                }
               
             })
             }
            
         }) 
})


</script>
</div>

</body>
</html>