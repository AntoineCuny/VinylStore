<table class="table table-striped"> 
		<tr>
			<th>Image</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
		<?php foreach($medias as $k=>$v): $v = current($v); ?>
		<tr>
			<td><?php echo $this->Html->image($v['url'],array('style'=>'max-width:230px')); ?></td>
			<td><?php echo $v['name']; ?></td>
			<td>
				<?php echo $this->Html->link("Insérer",array('action'=>'show',$v['id'])); ?> -
				<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'voulez vous vraiment supprimer l\'image ?'); ?> 
			</td>
		</tr>
		<?php endforeach ?>
	</table>

<h3> Ajouter une image </h3>

<?php echo $this->Form->create('Media',array('type'=>'file')); ?>
	<?php echo $this->Form->input('file',array('label'=>"Image (format png/jpg)", 'type'=>'file')); ?>
	<?php echo $this->Form->input('name',array('label'=>"Nom de l'image")); ?>

<?php echo $this->Form->end('Ajouter'); ?>




