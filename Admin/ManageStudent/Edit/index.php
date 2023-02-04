<div class="modal fade" id="Edit<?php echo $row['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./Edit/edit.php" method="post">
        <div class="form-group">
          <label for="id">Id</label>
        <input type="text" class=" form-control plaintext m-2 bg-whtie" name="id" id="id" value="<?php echo $row['id'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="fname">Firstname</label>
        <input type="text" class="form-control m-2" name="fname" id="fname" value="<?php echo $row['Firstname'] ?>">
        </div>
        
        <div class="form-group">
          <label for="lname">Lastname</label>
        <input type="text" name="lname" class="form-control m-2" id="lname" value="<?php echo $row['Lastname'] ?>">
        </div>
      
        <div class="form-group">
          <label for="combination">combination</label>
        <input type="text" name="combination" class="form-control m-2" id="combination" value="<?php echo $row['combination'] ?>">
        </div>
      </div>
      <div class="modal-footer">
      <div class="form-group">
            <input type="submit" class=" btn btn-primary" name="update" value="update"/>
        </div>
     
    </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
       
      </div>
    </div>
  </div>
</div>
    </div>
    