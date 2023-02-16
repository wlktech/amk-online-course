
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 mt-4">
                <?php if(isset($_SESSION['expire'])){
                $diff = time() - $_SESSION['expire'];
                if($diff > 2){
                    unset($_SESSION['status']);
                    unset($_SESSION['expire']);
                }
                }
                ?>
                <?php if(isset($_SESSION['status'])){ ?>   
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <?php echo $_SESSION['status'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }?>
                    <h3><i class="fas fa-user-pen me-2"></i>Edit User</h3>
                    <form action="./src/Libs/controllers/UserController.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name'] ?>">
                            <?php if(isset($_SESSION['name'])){ ?>
                                <p class="text-danger"><?php echo $_SESSION['name'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo $user['age'] ?>">
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
                            <input type="date" name="doj" id="doj" class="form-control" value="<?php echo $user['doj'] ?>">
                            <?php if(isset($_SESSION['doj'])){ ?>
                                <p class="text-danger"><?php echo $_SESSION['doj'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="<?php echo $user['city'] ?>">
                            <?php if(isset($_SESSION['city'])){ ?>
                                <p class="text-danger"><?php echo $_SESSION['city'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" name="salary" id="salary" class="form-control" value="<?php echo $user['salary'] ?>">
                            <?php if(isset($_SESSION['salary'])){ ?>
                                <p class="text-danger"><?php echo $_SESSION['salary'] ?></p>
                            <?php } ?>
                        </div>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <div class="text-end">
                            <button class="btn btn-success" type="submit"><i class="fas fa-user-pen me-2"></i> Edit User</button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
            
        </div>
