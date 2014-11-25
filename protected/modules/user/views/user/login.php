<div class="box">

	<h1>登陆</h1>

	<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

	<div class="success">
		<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
	</div>

	<?php endif; ?>

	<div class="form">
	<?php echo CHtml::beginForm(); ?>

		<p class="note">带<span class="required">*</span>必填</p>
		
		<?php echo CHtml::errorSummary($model); ?>

		<div class="row mt5">
			<div class="col-xs-4 tr">
				<?php echo CHtml::activeLabelEx($model,'username'); ?>
			</div>
			<div class="col-xs-8 tl">
				<?php echo CHtml::activeTextField($model,'username') ?>
			</div>  
		</div>

		<div class="row mt15">
			<div class="col-xs-4 tr">
				<?php echo CHtml::activeLabelEx($model,'password'); ?>
			</div>
			<div class="col-xs-8 tl">
				<?php echo CHtml::activePasswordField($model,'password') ?>
			</div>  
		</div>
		
		<div class="row mt15">
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("注册"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("忘记密码"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
		</div>
		
		<div class="row rememberMe">
			<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		</div>

		<div class="row submit">
			<?php echo CHtml::submitButton(UserModule::t("登陆")); ?>
		</div>
		
	<?php echo CHtml::endForm(); ?>
	</div><!-- form -->


	<?php
	$form = new CForm(array(
	    'elements'=>array(
	        'username'=>array(
	            'type'=>'text',
	            'maxlength'=>32,
	        ),
	        'password'=>array(
	            'type'=>'password',
	            'maxlength'=>32,
	        ),
	        'rememberMe'=>array(
	            'type'=>'checkbox',
	        )
	    ),

	    'buttons'=>array(
	        'login'=>array(
	            'type'=>'submit',
	            'label'=>'Login',
	        ),
	    ),
	), $model);
	?>
	
</div>
