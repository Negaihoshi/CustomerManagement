<?php session_start(); ?>
<?php
include("connect_db.php");

$admin = $_POST['admin'];
$mid   = $_GET['mid'];
$userID = $_SESSION['userID'];


if($_SESSION['email']!= null && $mid != $userID){

    $sql = "update member set admin='$admin' where mid = '$mid'";
    if(mysql_query($sql)){
        //echo '修改成功!';
        $url = "adminEdit.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        //echo '修改失敗!';
        $url = "adminEdit.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";

    }
}
else{
        echo '<link href="../css/uikit.gradient.min.css" rel="stylesheet">';
        echo '<script src="../js/uikit.min.js"></script>';
        echo '<style>#content {margin: 2em;}</style>';
        echo '<div id="content"><div clss="uk-grid">';
        echo '<div class="uk-width-2-5 uk-container-center">';
        echo "<div class='uk-alert uk-alert-warning'>";
    if($mid == $userID) {
        echo "你不能更改自己的權限！";
        echo '</div></div></div></div>';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=adminEdit.php>';
    }
    else{
        echo '您無權限觀看此頁面！';
        echo '</div></div></div></div>';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=adminEdit.php>';
    }
}
?>