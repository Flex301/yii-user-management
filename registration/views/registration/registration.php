<h1> <?php echo Yum::t('Registration'); ?> </h1>

<?php $this->breadcrumbs = array(Yum::t('Registration')); ?>

<div class="form">
<?php $activeform = $this->beginWidget('CActiveForm', array(
			'id'=>'registration-form',
			'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
			'focus'=>array($form,'username'),
			));
?>

<?php echo Yum::requiredFieldNote(); ?>
<?php echo $activeform->errorSummary($form); ?>
<div class="row">
<div class="span12"> <?php
echo $activeform->labelEx($form,'email');
echo $activeform->textField($form,'email');
echo $activeform->error($form,'email');
?> </div></div>

<div class="row"><div class="span12"> <?php
echo $activeform->labelEx($form,'firstname');
echo $activeform->textField($form,'firstname');
echo $activeform->error($form,'firstname');
?> </div></div>

<div class="row"><div class="span12"> <?php
echo $activeform->labelEx($form,'lastname');
echo $activeform->textField($form,'lastname');
echo $activeform->error($form,'firstname');
?> </div></div>

<div class="row">
<div class="span12">
<?php echo $activeform->labelEx($form,'password'); ?>
<?php echo $activeform->passwordField($form,'password'); ?>
<?php echo $activeform->error($form,'password'); ?>
</div>
</div>

<div class="row">
<div class="span12">
<?php echo $activeform->labelEx($form,'verifyPassword'); ?>
<?php echo $activeform->passwordField($form,'verifyPassword'); ?>
<?php echo $activeform->error($form,'verifyPassword'); ?>
</div></div>

<?php if(extension_loaded('gd') 
			&& Yum::module('registration')->enableCaptcha): ?>
	<div class="row">
    	<div class="span12">
		<?php echo CHtml::activeLabelEx($form,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo CHtml::activeTextField($form,'verifyCode'); ?>
		</div>
		<p class="hint">
		<?php echo Yum::t('Please enter the letters as they are shown in the image above.'); ?>
		<br/><?php echo Yum::t('Letters are not case-sensitive.'); ?></p>
	</div></div>
	<?php endif; ?>
	
	<div class="row submit">
    <div class="span12">
		<?php echo CHtml::submitButton(Yii::t('user', 'Registration'), array('class'=>'btn')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
