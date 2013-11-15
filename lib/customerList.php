<?
    session_start();   
?>
<?
    if($_SESSION['email'] == null){
        echo "您無權限瀏覽此頁面";
        echo "<meta http-equiv=REFRESH CONTENT=2;url=../index.php>";
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
    <script src="../js/customerList.js"></script>
</head>
<body ng-controller="SearchCtrl">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.php">客戶管理系統</a></li>
            <li><a href="customerList.php">客戶管理</a></li>
            <li class="uk-parent"><a href="addCustomer.php">新客戶</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="member.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?></a></li>
                <li><a href="memberEdit.php">修改會員資料</a></li>
                <li><a href="logout.php">登出</a></li>
            </ul>
        </div>
    </nav>

    <div id="container">
        <form class="uk-form">
            <fieldset>
                <legend>搜尋</legend>
                <div class="uk-form-row">
                    <form class="uk-search" data-uk-search>
                        <input class="uk-search-field" ng-model="query" type="search" placeholder="search...">
                    </form>
                </div>
                <div class="uk-form-row">
                    <select ng-model="orderProp">
                        <option value="name">Alphabetical</option>
                        <option value="RegisterDate">Newest</option>
                    </select>
                </div>
            </fieldset>
        </form>
        <table class="uk-table">
            <caption>客戶資料</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>客戶名稱</th>
                    <th>信箱</th>
                    <th>聯絡電話</th>
                    <th>行動電話</th>
                    <th>地址</th>
                    <th>RegisterDate</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="customer in customers | filter:query | orderBy:orderProp">
                    <td>{{customer.id}}</td>
                    <td><a href="">{{customer.name}}</a></td>
                    <td>{{customer.email}}</td>
                    <td>{{customer.tel}}</td>
                    <td>{{customer.mobile}}</td>
                    <td>{{customer.address}}</td>
                    <td>{{customer.RegisterDate}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
