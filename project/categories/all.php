
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

                <h3 class="mb-3 d-inline">All Category List</h3>
                <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Category</button>
            </div>
        
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th> 
                            <th class="text-center">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($categories as $category){ ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $category['category_name'] ?></td>
                                <td class="text-center"><?php echo $category['created_at'] ?></td>
                                <td class="text-center">
                                    
                                    <button class="btn btn-sm updateCategory" data-id="<?php echo $category['id'] ?>" data-name="<?php echo $category['category_name'] ?>" type="submit"  data-bs-target="#update" data-bs-toggle="modal"><i class="fas fa-pen-to-square text-success"></i></button>
                                    

                                    
                                    <a href="../src/Libs/controllers/CategoryController.php?action=delete&id=<?php echo $category['id'] ?>" class="text-decoration-none"><i class="fas fa-trash text-danger"></i></a>
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
include "categorymodal.php";
include "updatemodal.php";
?>