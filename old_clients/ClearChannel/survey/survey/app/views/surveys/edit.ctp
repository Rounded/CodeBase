<?      echo $this->Html->css('admin'); ?>
<div class="surveys form">
<?php echo $this->Form->create('Survey');?>
	<fieldset>
		<legend><?php __('Edit Survey'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('q1');
		echo $this->Form->input('q2_1');
		echo $this->Form->input('q2_2');
		echo $this->Form->input('q2_3');
		echo $this->Form->input('q3');
		echo $this->Form->input('q4');
		echo $this->Form->input('q5');
		echo $this->Form->input('ip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Survey.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Survey.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys', true), array('action' => 'index'));?></li>
	</ul>
</div>