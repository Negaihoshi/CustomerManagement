<!doctype html>
<html lang="zh-tw" ng-app>

<head>
    <meta charset="UTF-8">

    <title>SurveySystem</title>
    <link rel="stylesheet" href="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="../css/uikit.gradient.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular.min.js"></script>
    <script scr="../js/uikit.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.html">問卷系統</a></li>
            <li><a href="">測試1</a></li>
            <li class="uk-parent"><a href="">測試2</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li><a href="../lib/login.php">登入</a></li>
                <li><a href="../lib/register.php">註冊</a></li>
            </ul>
        </div>
    </nav>


    <div clss="uk-grid">
        <div class="uk-width-2-5 uk-container-center">
        <form class="uk-form uk-form-horizontal" name="form" method="post" action="register_check.php">
            <fieldset>
                <legend>使用者註冊</legend>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="username">使用者名稱</label>
                    <input type="text" placeholder="Enter username" class="uk-form-width-medium" id="username" name="username" required autofucus>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="email">電子信箱</label>
                    <input type="email" placeholder="Enter email" class="uk-form-width-medium" id="email" name="email" required>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="password">使用者密碼</label>
                    <input type="password" placeholder="Enter Password" class="uk-form-width-medium" id="password" name="password" required>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="repeatPassword">再次輸入密碼</label>
                    <input type="password" placeholder="Enter Password" class="uk-form-width-medium" id="repeatPassword" name="repeatPassword" required>
                </div>
                <button class="uk-button" type="submit">註冊</button>
            </fieldset>
        </form>
        </div>
    </div>

    <div id="content">
    </div>
    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

    <!-- Javascript -->
    <script scr="js/uikit.min.js"></script>
</body>

</html>
