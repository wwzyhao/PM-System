

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>软院项目管理系统</title>
        <link type="text/css" rel="stylesheet" href="CodeInfoFiles/CodeInfo.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/global.css" />
        <link type="text/css" rel="stylesheet" href="GlobalFiles/css/jquery-ui-1.8.17.custom.css" />
        <script type="text/javascript" src="GlobalFiles/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/global.js"></script>
        <script type="text/javascript" src="CodeInfoFiles/CodeInfo.js"></script>

        
         <link type="text/css" rel="stylesheet" href="css/mai.css" />
        <link type="text/css" rel="stylesheet" href="CodeHomeFiles/css/CodeHome.css" />
     
        <script type="text/javascript" src="GlobalFiles/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="GlobalFiles/js/ui/jquery.ui.button.min.js"></script>

        <script type="text/javascript" src="GlobalFiles/js/global.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/CodeHome.js"></script>
    </head>
    <body>
        <div id="header">
            <div id="top-header">	
                <p id="username">您好<?php
//                if(!(Yii::app()->user->getIsGuest())){
//                if (isset (Yii::app()->user->getState('nick',NULL))) {
//                    $name = Yii::app()->user->getState('nick');
//}  else {
//    $name = Yii::app()->user->name;
//}
if (Yii::app()->user->name !== 'Guest') {
    $nickname = User::model()->findByPk(Yii::app()->user->getState('id'))->NickName;
    $name = Yii::app()->user->name;
    if (!empty($nickname)) {
        $name = $nickname;
    }
    echo ',';
    echo $name;
//                        Yii::app()->user->name
    ;
}

//                }
?>！</p>
                <?php
//                $appmain = Yii::app()->createUrl();
                ?> 
                <a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>" class="btn" >首页</a>
                <?php
                if (Yii::app()->user->getIsGuest()) {
                    $loginurl = Yii::app()->createUrl('site/login');
                    $registerurl = Yii::app()->createUrl('site/register');
                    echo "<a href=\" $loginurl \" type=\"hidden\" class=\"btn\" >登陆</a>";
                    echo "<a href=\" $registerurl \" type=\"hidden\" class=\"btn\" >注册</a>";
                }  else {
                    $manageinfourl = Yii::app()->createUrl('site/manageinfo');
                    echo "<a href=\"$manageinfourl\" class=\"btn\" id=\"account\">账户管理</a>";
                    $logouturl = Yii::app()->createUrl('site/logout');
                    echo "<a href=\"$logouturl\" class=\"btn\" id=\"account\">注销</a>";
                }
                ?>
                <?php 
//                echo Yii::app()->user->name?>
				
			
            </div>

            <img alt="logo" src="GlobalFiles/logo.png" id="logo" />
        </div>
        <div id="nav">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('apphome/index'); ?>">应用</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('codemain/index'); ?>">源码</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('project/view'); ?>">我的项目</a></li>

                <li><a href="<?php echo Yii::app()->createUrl('project/create'); ?>">创建项目</a></li>
<!--                <li><a href="">SVN账号管理</a></li>-->
            </ul>
        </div>

<?php echo $content; ?>

        <div id="footer">
            <ul>
                <li><a href="http://software.nju.edu.cn/">软件学院</a></li>
                <li><a href="http://software.nju.edu.cn/">南京大学</a></li>
                <li><a href="http://software.nju.edu.cn/">Copyright 2012-2013 南京大学软件学院</a></li>

            </ul>
        </div>
    </body>
</html>