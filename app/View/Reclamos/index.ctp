<div class="reclamos index">
	<h2><?php echo __('Reclamos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('texto'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('id_usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('id_categoria'); ?></th>
			<th><?php echo $this->Paginator->sort('id_colegio'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reclamos as $reclamo): ?>
	<tr>
		<td><?php echo h($reclamo['Reclamo']['id']); ?>&nbsp;</td>
		<td><?php echo h($reclamo['Reclamo']['texto']); ?>&nbsp;</td>
		<td><?php echo h($reclamo['Reclamo']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($reclamo['Reclamo']['fecha']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reclamo['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'view', $reclamo['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reclamo['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $reclamo['Categoria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reclamo['Colegio']['nombre'], array('controller' => 'colegios', 'action' => 'view', $reclamo['Colegio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reclamo['Reclamo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reclamo['Reclamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reclamo['Reclamo']['id']), null, __('Are you sure you want to delete # %s?', $reclamo['Reclamo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Reclamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Colegios'), array('controller' => 'colegios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colegio'), array('controller' => 'colegios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archivos'), array('controller' => 'archivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo'), array('controller' => 'archivos', 'action' => 'add')); ?> </li>
	</ul>
</div>
