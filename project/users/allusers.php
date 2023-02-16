        <div class="col-lg-10 my-4">
            <div class="mb-3">
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

                <h3 class="mb-3 d-inline">All Users List</h3>
                <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Create User</button>
            </div>
        
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Date of Job</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Salary</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($users as $user){ ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $user['name'] ?></td>
                                <td class="text-center"><?php echo $user['age'] ?></td>
                                <td class="text-center" style="text-transform:uppercase"><?php echo $user['gender'] ?></td>
                                <td class="text-center"><?php echo $user['doj'] ?></td>
                                <td class="text-center"><?php echo $user['city'] ?></td>
                                <td class="text-center"><?php echo $user['salary'] ?></td>
                                <td class="text-center">
                                    <a href="index.php?page=updateuser&id=<?php echo $user['id'] ?>" class="text-decoration-none"><i class="fas fa-user-pen me-2 text-success"></i></a>
                                    <a href="./src/Libs/controllers/UserController.php?action=delete&id=<?php echo $user['id'] ?>" class="text-decoration-none"><i class="fas fa-user-minus text-danger"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?php 
include "usermodal.php";
?>