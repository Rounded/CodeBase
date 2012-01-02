<?      echo $this->Html->css('admin'); ?>
<div class="surveys index">
	<h2><?php __('Surveys');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('q1');?></th>
			<th><?php echo $this->Paginator->sort('q2_1');?></th>
			<th><?php echo $this->Paginator->sort('q2_2');?></th>
			<th><?php echo $this->Paginator->sort('q2_3');?></th>
			<th><?php echo $this->Paginator->sort('q3');?></th>
			<th><?php echo $this->Paginator->sort('q4');?></th>
			<th><?php echo $this->Paginator->sort('q5');?></th>
			<th><?php echo $this->Paginator->sort('ip');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($surveys as $survey):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $survey['Survey']['id']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q1']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q2_1']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q2_2']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q2_3']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q3']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q4']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['q5']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['ip']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $survey['Survey']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $survey['Survey']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $survey['Survey']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Survey', true), array('action' => 'add')); ?></li>
	</ul>
</div>