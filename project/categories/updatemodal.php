<!-- Modal -->
<div class="modal" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <?php if(isset($_SESSION['expire'])){
                $diff = time() - $_SESSION['expire'];
                if($diff > 2){
                    unset($_SESSION['status']);
                    unset($_SESSION['expire']);
                }
            }
            ?>
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-plus me-2"></i>Update Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="../src/Libs/controllers/CategoryController.php" method="post">
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name">
                <?php if(isset($_SESSION['category_name'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['category_name'] ?></p>
                <?php } ?>
                
            </div>
        </div>
        <input type="hidden" name="action" value="update">
        <input type="hidden" id="id" name="id">
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-square-to-pen me-2"></i>Update Category</button>
        </div>
      </form>
    </div>
  </div>
</div>

