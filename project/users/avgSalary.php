        <div class="col-lg-3 my-4">
            <h3 class="mb-3">Average Salary</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Average Salary</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach($avg as $user){ ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $user['average'] ?></td>
                                
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
        
    </div>
</div>