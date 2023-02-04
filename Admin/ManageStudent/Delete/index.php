<div class="modal fade" id="deletestaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure want to delete this item!!</h4>
      <div class="modal-footer">
        <a href="./Delete/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        <?php
          echo $row["id"];
          $_SESSION["key"] = $row["id"];
          ?>
      </div>
    </div>
  </div>
</div>
    </div>