<div class="categorias view">
<h2><?php  echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), null, __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reclamos'), array('controller' => 'reclamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reclamo'), array('controller' => 'reclamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reclamos'); ?></h3>
	<?php if (!empty($categoria['Reclamo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Texto'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Id Usuario'); ?></th>
		<th><?php echo __('Id Categoria'); ?></th>
		<th><?php echo __('Id Colegio'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Reclamo'] as $reclamo): ?>
		<tr>
			<td><?php echo $reclamo['id']; ?></td>
			<td><?php echo $reclamo['texto']; ?></td>
			<td><?php echo $reclamo['titulo']; ?></td>
			<td><?php echo $reclamo['fecha']; ?></td>
			<td><?php echo $reclamo['id_usuario']; ?></td>
			<td><?php echo $reclamo['id_categoria']; ?></td>
			<td><?php echo $reclamo['id_colegio']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reclamos', 'action' => 'view', $reclamo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reclamos', 'action' => 'edit', $reclamo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reclamos', 'action' => 'delete', $reclamo['id']), null, __('Are you sure you want to delete # %s?', $reclamo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reclamo'), array('controller' => 'reclamos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
