<?php 
include('../vendor/autoload.php');
use Amk\NewChat\App\Databases\DBConnection as DB;
use Amk\NewChat\App\Databases\ChatModel;
use Helpers\HTTP;

$data = [
 'user_id' => $_POST['user_id'],
 'to_id' => $_POST['to_id'],
 'message' => $_POST['message'],
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$db = new ChatModel(new DB());
$result = $db->InsertMessage($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
if ($result) {
 HTTP::redirect('chat.php?id=' . $_POST['to_id']);
}

?>