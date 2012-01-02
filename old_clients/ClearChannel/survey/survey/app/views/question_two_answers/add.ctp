<div class="questionTwoAnswers form">
<?php echo $this->Form->create('QuestionTwoAnswer');?>
	<fieldset>
		<legend><?php __('Add Question Two Answer'); ?></legend>
	<?php
		echo $this->Form->input('answer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Question Two Answers', true), array('action' => 'index'));?></li>
	</ul>
</div>