<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/userFeedback.php'; ?>
<?php
$feedbackModel = new userFeedback();
$feedbackModel->productId = $_GET['product_id'];
$feedbackModel->userId    = $_SESSION['user_id'];
$feedbackModel->rate      = isset($_POST['star1']) ? $_POST['star1'] : 0; 
$feedbackModel->comment   = $_POST['comment'];
$feedbackModel->insert();
?>
<div class="main">
    <div class="wrap">
        <div style="clear: both"></div>
        <div style="height: 350px">
            <h3 class="m_3" style="margin-top: 100px;color: green">Thanks For Your Feedback </h3></div>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?>