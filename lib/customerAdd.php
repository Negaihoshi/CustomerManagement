<?
    session_start();
?>
<?
    if(isset($_SESSION['email'])== false){
        setcookie("userCheck", "false", time()+60);
        $url = "login.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
?>
<!doctype html>
<html lang="zh-tw" ng-app>

<head>
    <meta charset="UTF-8">

    <title>CustomerManagement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="../css/uikit.gradient.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/uikit.min.js"></script>
</head>
<body>
    <div id="header">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li><a href="../index.php">客戶管理系統</a></li>
            <li><a href="customerList.php">客戶管理</a></li>
            <li class="uk-active"><a href="customerAdd.php">新客戶</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-parent" data-uk-dropdown="">
                    <a href="memberEdit.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?> <i class="uk-icon-caret-down"></i></a>

                    <div style="" class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="memberEdit.php">修改會員資料</a></li>
                            <?php
                                if(isset($_SESSION['admin'])==true){
                                    $admin = $_SESSION['admin'];
                                    if ($admin == 1) {
                                        echo "<li class='uk-nav-divider'></li>";
                                        echo "<li><a href='adminEdit.php'>管理員</a></li>";
                                    }
                                }
                            ?>
                            <li class="uk-nav-divider"></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    </div>
    <script>
        function AddCustomer(){

            newTable = document.getElementById('customerTable').insertRow(document.getElementById('customerTable').rows.length);
            tableCustomerName = newTable.insertCell(0);
            tableEmail = newTable.insertCell(1);
            tablePhone = newTable.insertCell(2);
            tableMobile = newTable.insertCell(3);
            tableAddress = newTable.insertCell(4);

            tableCustomerName.innerHTML += "<input type='text' class='uk-form-width-small' name='customerName[]' />";
            tableEmail.innerHTML += "<input type='email' class='uk-form-width-medium' name='email[]' />";
            tablePhone.innerHTML += "<input type='number' class='uk-form-width-small' name='phone[]' />";
            tableMobile.innerHTML += "<input type='number' class='uk-form-width-small' name='mobile[]' />";  
            tableAddress.innerHTML += "<input type='text' class='uk-form-width-medium' name='address[]' />";  
        }
        function RemoveCustomer(){

            TableLength = document.getElementById('customerTable').rows.length;
            if (TableLength > 2) {
                document.getElementById("customerTable").deleteRow(-1);
            };
        }
    </script>

    <div id="content" >
        <div class="uk-grid">
            <div class="uk-width-1-10">
                <input type="button" class="uk-button uk-button-primary" value="增加一筆" onclick="AddCustomer()">
                <br>
                <input type="button" class="uk-button uk-button-danger" value="刪除一筆" onclick="RemoveCustomer()">
            </div>
            <div class="uk-width-7-10">
        <form class="uk-form" name="editForm" method="post" action="customerAddCheck.php">
            <table class="uk-table" id="customerTable">
                <caption>會員資料</caption>
                <thead>
                    <tr>
                        <th>
                            <label class="uk-form-label" for="customerName">客戶名稱</label>
                        </th>
                        <th>
                            <label class="uk-form-label" for="email">電子信箱</label>
                        </th>
                        <th>
                            <label class="uk-form-label" for="phone">聯絡電話</label>
                        </th>
                        <th>
                            <label class="uk-form-label" for="mobile">行動電話</label>
                        </th>
                        <th>
                            <label class="uk-form-label" for="address">地址</label>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text"  class="uk-form-width-small" id="customerName" name="customerName[]" required autofucus>
                        </td>
                        <td>
                            <input type="email"  class="uk-form-width-medium" id="email" name="email[]" required>
                        </td>
                        <td>
                            <input type="number"  class="uk-form-width-small" id="phone" name="phone[]" required>
                        </td>
                        <td>
                            <input type="number"  class="uk-form-width-small" id="mobile" name="mobile[]" required>
                        </td>
                        <td>
                            <input type="text"  class="uk-form-width-medium" id="address" name="address[]" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="uk-button uk-button-success" type="submit">新增</button>
        </form>

        </div>
    </div>
    </div>
    <!--
    <div class="tm-footer">
        <div class="uk-container uk-container-center uk-text-center">
            <p>&copy; Company 2013</p>
        </div>
    </div>
    -->
    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
