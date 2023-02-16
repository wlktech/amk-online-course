<!-- Modal -->
<div class="modal fade" id="exampleModal">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-user-plus me-2"></i>Create User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="../src/Libs/controllers/UserController.php" method="post">
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <?php if(isset($_SESSION['name'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['name'] ?></p>
                <?php } ?>
                
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
                <?php if(isset($_SESSION['age'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['age'] ?></p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <?php if(isset($_SESSION['gender'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['gender'] ?></p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="doj" class="form-label">Date of Job</label>
                <input type="date" name="doj" id="doj" class="form-control">
                <?php if(isset($_SESSION['doj'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['doj'] ?></p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control">
                <?php if(isset($_SESSION['city'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['city'] ?></p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" id="salary" class="form-control">
                <?php if(isset($_SESSION['salary'])){ ?>
                    <p class="text-danger"><?php echo $_SESSION['salary'] ?></p>
                <?php } ?>
            </div>
        </div>
        <input type="hidden" name="action" value="add">
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>