<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["assignment_title"];  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-start">
      <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars('assignment1.php'); ?>">
        <input type="text" class="bg-white form-control" name="atitle" readonly="" value="<?php echo $row["assignment_title"];  ?>">
          <input class="form-control-file m-3" type="file" name="file" type="image/*" required>
          <small>If any note...</small>
          <textarea class="form-control p-3" name="note"  placeholder="Remarks..."></textarea>
          <input class="btn btn-primary m-3" type="submit" name="submit" value="submit the Assginment">
        </form>

      </div>
      <div class="modal-footer">
              </div>
    </div>
  </div>
</div>
</div>