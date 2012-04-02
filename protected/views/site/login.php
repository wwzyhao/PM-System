<?php
$this->pageTitle=Yii::app()->name . ' - Login';
//        Yii::app()->user->logout();
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="/~FK/testdrive/GlobalFiles/global.css" />

<title>Sign in</title> 
<link type="text/css" rel="stylesheet" href="GlobalFiles/global.css" /> 

<style>table {font-family: tahoma; font-size: 12px}</style>
</head> 
<body> 
    <div id="header"> 
        <div id="top-header">	
            <p id="username">您好！</p> 
            <a href="" class="btn" >应用首页</a> 
            <a href="" class="btn" id="logout">退出</a>            
      </div> 
        <img alt="logo" src="GlobalFiles/logo.png" id="logo" /> 
    </div> -->

<!--<button href =" "></button>-->

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div id="signin">
    <center>
<!--<h1>Login</h1>-->

<p>请在下表填入登陆所需信息</p><br />
	<p class="note">Fields with <span class="required">*</span> are required.</p>
<br />
	<table border="0" cellspacing="" cellpadding="3" width="500"> 
            <tr>
		<td style="text-align:right; font-size:20px;" >
		<?php echo $form->labelEx($model,'username');?></td>
                <td style="text-align:left; font-size:20px;">
                <?php echo $form->textField($model,'username'); ?></td>
                <td style="text-align:top; font-size:16px; color:red;">
		<?php echo $form->error($model,'username'); ?></td>
	</tr>
        <tr> 
        <td colspan="3">&nbsp;</td> 
    </tr>
    <tr>
        <td style="text-align:right; font-size:20px;" >
		<?php echo $form->labelEx($model,'password'); ?>
            </td>
            <td style="text-align:left; font-size:20px;">
		<?php echo $form->passwordField($model,'password'); ?>
                </td>
                <td style="text-align:left; font-size:16px; color:red;">
		<?php echo $form->error($model,'password'); ?>
                    </td>
	</tr>	
	

	<tr> 
        <td colspan="3">&nbsp;</td> 
    </tr>
    
    <tr>
        <td></td>
        <td><div class="errorMessage" id="LoginForm_rememberMe_em_" style="display:none"></div></td>
    <td style="text-align:right; font-size:18px;" >
		<?php echo $form->checkBox($model,'rememberMe'); ?>
        
        
		<?php echo $form->label($model,'rememberMe'); ?>
        </td>
		<?php echo $form->error($model,'rememberMe'); ?>
</tr>
	<tr> 
        <td colspan="3">&nbsp;</td> 
    </tr>
    
    <tr><td colspan="3" style="font-size:18px;">
		<?php echo CHtml::submitButton('登陆'); ?></td>
    </tr>
   
    <tr><td colspan="3" style="font-size:18px;">
<a href="<?php echo Yii::app()->createUrl('site/register'); ?>">还没有账号?</a>
</td>
    </tr>
 
        </table>

        </center>

</div>
    
<!--<div id="footer"> 
    	<ul> 
        	<li><a href="http://software.nju.edu.cn/">软件学院</a></li> 
            <li><a href="http://software.nju.edu.cn/">南京大学</a></li> 
            <li><a href="http://software.nju.edu.cn/">Copyright 2012-2013 南京大学软件学院</a></li> 
        </ul> 
    </div> -->

<?php $this->endWidget(); ?>
