<link rel="stylesheet" href="layouts/style.css">
<?php 
include "vendor/autoload.php";
use Wlk\Chatapp\Databases\DB;
use Wlk\Chatapp\Databases\QueryBuilder;
use Amk\NewChat\App\Databases\ChatModel;
use Helpers\Auth;


$db = new QueryBuilder(new DB());
$users = $db->getAll('users', '*', null, null, null);

$auth = Auth::check();

$db = new UserModel(new DB());
$profile_image = $db->GetProfileImage($_GET['id']);
$user_name = $db->GetUserName($_GET['id']);

$db_chat = new ChatModel(new DB());
$data = [
 'user_id' => $auth->id,
 'to_id' => $_GET['id'],
];
$chats = $db_chat->GetAllChats($data);
?>
<?php include('layouts/head.php'); ?>

<body>
 <?php include('layouts/navbar.php'); ?>

 <div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="card mt-5">
     <div class="card-header msg_head">
      <div class="d-flex bd-highlight">
       <div class="img_cont">
        <img src="_actions/profile/<?= $profile_image->profile; ?>" class="rounded-circle user_img">
        <span class="online_icon"></span>
       </div>
       <div class="user_info">
        <span>Chat with <?= $user_name->user_name; ?></span>
        <p>
         <!-- count messages -->
         <?php 
          //echo count($chats)
          ?>
         - Messages
        </p>
       </div>
       <div class="video_cam">
        <span><i class="fas fa-video"></i></span>
        <span><i class="fas fa-phone"></i></span>
       </div>
      </div>
      <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
      <div class="action_menu">
       <ul>
        <li><i class="fas fa-user-circle"></i> View profile</li>
        <li><i class="fas fa-users"></i> Add to close friends</li>
        <li><i class="fas fa-plus"></i> Add to group</li>
        <li><i class="fas fa-ban"></i> Block</li>
       </ul>
      </div>
     </div>
     <div class="chat-window">

      <div class="chat-messages">
       <?php foreach($chats as $chat) : ?>
       <?php if($chat->to_id == $_GET['id']) : ?>
       <div class="message incoming-message">
        <div class="message-avatar">
         <img src="_actions/profile/<?= $profile_image->profile; ?>" alt="Avatar">
        </div>
        <div class="message-content">
         <div class="message-text"><?= $chat->message ?></div>
         <div class="message-meta"><?= date('M j, Y g:i A', strtotime($chat->created_at)) ?></div>
        </div>
       </div>
       <?php else : ?>
       <div class="message outgoing-message">
        <div class="sent_msg">
         <div class="message-avatar">
          <img src="_actions/profile/<?= $auth->profile; ?>" alt="Avatar">
         </div>
         <div class="out_message-content">
          <div class="message-text"><?= $chat->message ?></div>
          <div class="message-meta"><?= date('M j, Y g:i A', strtotime($chat->created_at)) ?></div>
         </div>
        </div>
       </div>
       <?php endif; ?>
       <?php endforeach; ?>
      </div>



      <div class="chat-input">
       <form action="_actions/chat_create.php" method="post" id="form-data">
        <input type="hidden" name="user_id" value="<?= $auth->id ?>">
        <input type="hidden" name="to_id" value="<?= $_GET['id'] ?>">
        <input type="text" name="message" placeholder="Type your message...">
        <button type="submit" id="send_btn"><i class="fa fa-paper-plane"></i></button>
       </form>
      </div>
     </div>
    </div>
   </div>
   <!-- <div class="col-md-4">
   </div> -->

  </div>
 </div>

 <?php include('layouts/footer.php'); ?>

 <script>
 $(document).ready(function() {
  $('#action_menu_btn').click(function() {
   $('.action_menu').toggle();
  });
 });
 </script>

 <script>
 const chatMessages = document.querySelector('.chat-messages');

 // Scroll to the bottom of the chat messages container
 function scrollToBottom() {
  chatMessages.scrollTop = chatMessages.scrollHeight;
 }

 // Automatically scroll to the bottom of the chat messages container when new messages are added
 function handleNewMessage() {
  scrollToBottom();
 }

 // Automatically scroll to the bottom of the chat messages container when the page loads
 window.onload = function() {
  scrollToBottom();
 };

 // Automatically scroll to the bottom of the chat messages container when new messages are added
 chatMessages.addEventListener('DOMNodeInserted', handleNewMessage);
 </script>

 <script>
 $(document).ready(function() {
  $('#action_menu_btn').click(function() {
   $('.action_menu').toggle();
  });
 });
 </script>