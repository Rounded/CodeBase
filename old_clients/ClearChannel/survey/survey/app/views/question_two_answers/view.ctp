<div class="questionTwoAnswers view">
<h2><?php  __('Question Two Answer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $questionTwoAnswer['QuestionTwoAnswer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Answer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $questionTwoAnswer['QuestionTwoAnswer']['answer']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question Two Answer', true), array('action' => 'edit', $questionTwoAnswer['QuestionTwoAnswer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Question Two Answer', true), array('action' => 'delete', $questionTwoAnswer['QuestionTwoAnswer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $questionTwoAnswer['QuestionTwoAnswer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Two Answers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Two Answer', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
