<div class="questionTwoAnswers form">
<?php echo $this->Form->create('QuestionTwoAnswer');?>
	<fieldset>
		<legend><?php __('Edit Question Two Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('answer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('QuestionTwoAnswer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('QuestionTwoAnswer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Question Two Answers', true), array('action' => 'index'));?></li>
	</ul>
</div>