<div class="reclamos view">
<h2><?php  echo __('Reclamo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reclamo['Reclamo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($reclamo['Reclamo']['texto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($reclamo['Reclamo']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($reclamo['Reclamo']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reclamo['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'view', $reclamo['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reclamo['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $reclamo['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colegio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reclamo['Colegio']['nombre'], array('controller' => 'colegios', 'action' => 'view', $reclamo['Colegio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reclamo'), array('action' => 'edit', $reclamo['Reclamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reclamo'), array('action' => 'delete', $reclamo['Reclamo']['id']), null, __('Are you sure you want to delete # %s?', $reclamo['Reclamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reclamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reclamo'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Archivos'); ?></h3>
	<?php if (!empty($reclamo['archivo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Ubicacion'); ?></th>
		<th><?php echo __('Id Reclamo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reclamo['archivo'] as $archivo): ?>
		<tr>
			<td><?php echo $archivo['id']; ?></td>
			<td><?php echo $archivo['nombre']; ?></td>
			<td><?php echo $archivo['ubicacion']; ?></td>
			<td><?php echo $archivo['id_reclamo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'archivos', 'action' => 'view', $archivo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'archivos', 'action' => 'edit', $archivo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'archivos', 'action' => 'delete', $archivo['id']), null, __('Are you sure you want to delete # %s?', $archivo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Archivo'), array('controller' => 'archivos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
