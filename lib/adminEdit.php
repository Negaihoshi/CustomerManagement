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
<html lang="zh-tw" ng-app="CustomerList">

<head>
    <meta charset="UTF-8">

    <title>CustomerManagement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="../css/uikit.gradient.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
    <script src="../js/memberList.js"></script>
    <script src="../js/uikit.min.js"></script>
</head>
<body ng-controller="SearchCtrl">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li><a href="../index.php">客戶管理系統</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-parent" data-uk-dropdown="">
                    <a href="memberEdit.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?> <i class="uk-icon-caret-down"></i></a>

                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="memberEdit.php">修改會員資料</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="customerList.php">一般會員</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </div>
                </li>
        </div>
    </nav>

    <div id="content">
        <form class="uk-form">
            <fieldset>
                <div class="uk-form-row">
                    <form class="uk-search" data-uk-search>
                        <input class="uk-search-field" ng-model="query" type="search" placeholder="搜尋...">
                    </form>
                    <select ng-model="orderProp">
                        <option value="RegisterDate">最新</option>
                        <option value="name">按照字母順序</option>
                    </select>
                </div>
            </fieldset>
        </form>
            <table class="uk-table uk-table-striped">
                <caption>會員資料</caption>
                <thead>
                    <tr>
                        <th>mid</th>
                        <th>使用者名稱</th>
                        <th>信箱</th>
                        <th>密碼</th>
                        <th>管理員</th>
                        <th>註冊時間</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="customer in customers | filter:query | orderBy:orderProp">
                        <td>{{customer.mid}}</td>
                        <td>{{customer.username}}</a></td>
                        <td>{{customer.email}}</td>
                        <td>{{customer.password}}</td>
                        <td>
                            <form  class="uk-form" action="adminModify.php?mid={{customer.mid}}" method="POST">
                                <label><input type="checkbox" name='admin' ng-module="customer.admin" ng-checked="customer.admin==1">管理員</label>
                                <button class="uk-button uk-button-danger uk-button-mini" type="submit">確定</button>
                            </form>
                        </td>
                        <td>{{customer.registerDate}}</td>
                    </tr>
                </tbody>
            </table>
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
