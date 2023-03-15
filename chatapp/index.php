<?php 
session_start();
include "vendor/autoload.php";
use Wlk\Chatapp\Databases\DB;
use Wlk\Chatapp\Databases\QueryBuilder;

if(!isset($_SESSION['user'])){
    header("location: loginform.php");
}

$db = new QueryBuilder(new DB());
$users = $db->getAll('users', '*', null, null, null);


include "./layouts/head.php";
include "./layouts/navbar.php";

?>

<div class="container mt-5">
    <h4 class="mb-3">User Lists</h4>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($users as $user):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['status'] == 0 ? "<span class='badge text-bg-danger'>offline</span>" : "<span class='badge text-bg-success'>online</span>" ?></td>
                <td>
                    <?php if($_SESSION['user']['id'] != $user['id']): ?>
                        <a href='chat.php?id=<?= $user['id'] ?>' class='btn btn-sm btn-primary'>Send Message</a>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>






<?php 
include "./layouts/footer.php";
?>