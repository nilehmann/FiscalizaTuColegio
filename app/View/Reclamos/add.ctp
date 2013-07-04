<div class="reclamos form">
<?php echo $this->Form->create('Reclamo'); ?>
	<fieldset>
		<legend><?php echo __('Add Reclamo'); ?></legend>
	<?php
		echo $this->Form->input('texto');
		echo $this->Form->input('titulo');
		echo $this->Form->input('fecha');
		echo $this->Form->input('id_usuario');
		echo $this->Form->input('id_categoria');
		echo $this->Form->input('id_colegio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reclamos'), array('action' => 'index')); ?></li>
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
