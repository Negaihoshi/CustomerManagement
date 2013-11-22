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
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.php">客戶管理系統</a></li>
            <li><a href="customerList.php">客戶管理</a></li>
            <li class="uk-parent"><a href="customerAdd.php">新客戶</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="member.php"></a></li>
                
                <li class="uk-parent" data-uk-dropdown="">
                    <a href="member.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?> <i class="uk-icon-caret-down"></i></a>

                    <div style="" class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="memberEdit.php">修改會員資料</a></li>
                            <li><a href="#">Another item</a></li>
                            <li class="uk-nav-header">Header</li>
                            <li><a href="#">Item</a></li>
                            <li><a href="#">Another item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <script>
        function AddCustomer(){
            var inputList[] = {customerName,email,phone,mobile,address};
            var labelList[] = {customerNameLabel,emailLabel,phoneLabel,mobileLable,addressLabel}
            var inputTypeList[] = {text,email,number}
            customerNameLabel = document.createElement('label');
            customerName = document.createElement('input');
            emailLabel = document.createElement('label');
            email = document.createElement('input');
            phoneLabel = document.createElement('label');
            phone = document.createElement('input');
            mobileLabel = document.createElement('label');
            mobile = document.createElement('input');
            addressLabel = document.createElement('label');
            address = document.createElement('input');

            customerName.type = inputTypeList[0];
            email.type = inputTypeList[1];
            phone.type = inputTypeList[2];
            mobile.type = inputTypeList[2];
            address.type = inputTypeList[0];

            for (var i = 0 ; i <= inputList.length; i++){
                labelList[i].setAttribute('for', 'customerName');
                labelList[i].setAttribute('class', 'uk-form-label');
                inputList[i].class = 'uk-form-width-medium';
                inputList[i].id = inputList[i];
                inputList[i].name = inputList[i];
            }
            br   = document.createElement('br');
            for (var i = 0 ; i <= inputList.length; i++){
                document.getElementById('customerInput').appendChild(inputTypeList[i]);
                document.getElementById('customerInput').appendChild(inputList[i]);
                document.getElementById('customerInput').appendChild(br);
            }
        }
    </script>

    <div id="container">
        <div clss="uk-grid">
            <form class="uk-form" name="editForm" method="post" action="customerAddCheck.php">
                <fieldset>
                    <legend>會員資料</legend>
                    <div id="customerInput">
                        <label class="uk-form-label" for="customerName">客戶名稱</label>
                        <input type="text"  class="uk-form-width-medium" id="customerName" name="customerName" required autofucus>

                        <label class="uk-form-label" for="email">電子信箱</label>
                        <input type="email"  class="uk-form-width-medium" id="email" name="email">

                        <label class="uk-form-label" for="phone">聯絡電話</label>
                        <input type="number"  class="uk-form-width-medium" id="phone" name="phone">

                        <label class="uk-form-label" for="mobile">行動電話</label>
                        <input type="number"  class="uk-form-width-medium" id="mobile" name="mobile">

                        <label class="uk-form-label" for="address">地址</label>
                        <input type="text"  class="uk-form-width-medium" id="address" name="address">
                        
                    </div>
                </fieldset>
                <input type="button" class="uk-button" value="下一筆" onclick="AddCustomer()">
                <button class="uk-button" type="submit">新增</button>
            </form>
        </div>
    </div>
    
    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
