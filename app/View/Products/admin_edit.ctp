<div class="page-header">
	
<h1>Editer un Produit</h1>


<div class="form-group">
<?php echo $this->Form->create(['Product']); ?>

	<?php echo $this->Form->input('id'); ?>

	<?php echo $this->Form->input('name',array('label'=>'Titre')); ?>

	<?php echo $this->Form->input('slug',array('label'=>'URL')); ?>

	<?php echo $this->Form->input('content',array('label'=>'Contenu')); ?>

	<?php echo $this->Form->input('description',array('label'=>'Description')); ?>

	<?php echo $this->Form->input('listening',array('label'=>'Ecoute')); ?>

	<?php echo $this->Form->input('price',array('label'=>'Prix')); ?>

	<?php echo $this->Form->input('price_promo',array('label'=>'Prix promo')); ?>

	<?php echo $this->Form->input('artist_id',array('label'=>"Artiste")); ?>

	<?php echo $this->Form->input('album_id',array('label'=>"Album")); ?>

	<?php echo $this->Form->input('label_id',array('label'=>"Label")); ?>

	<?php echo $this->Form->input('product_category_id',array('label'=>"Catégorie Produit")); ?>

	<?php echo $this->Form->input('created',array('label'=>"date de publication", 'dateFormat' => 'DMY', 'timeFormat' => 24)); ?>

	<?php echo $this->Form->input('online',array('label'=>"En ligne")); ?>


<?php echo $this->Form->end('Envoyer'); ?>

</div>
<?php $this->Html->script('tinymce/tiny_mce.js',array('inline'=>false)); ?>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	tinyMCE.init({
			mode: 'textareas',
			theme: 'advanced',
			plugins: 'inlinepopups,paste,image',

			theme_advanced_buttons1 : 'bold,italic,underline,|,bullist,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,|,formatselect,code',
			theme_advanced_buttons2 : '',
			theme_advanced_buttons3 : '',
			theme_advanced_buttons4 : '',
			theme_advanced_statusbar_location : 'bottom',
			theme_advanced_resizing : true,
			paste_remove_styles : true,
			paste_remove_spans : true,
			paste_stip_class_attributes : "all",
			image_explorer : '<?php echo $this->Html->url(array('controller'=>'medias','action'=>'product',$this->request->data['Product']['id'])); ?>',
			image_edit : '<?php echo $this->Html->url(array('controller'=>'medias','action'=>'show')); ?>',
			relative_urls : false,
			content_css : '<?php  echo $this->Html->url('/css/wysiwyg.css'); ?>'
});

	function send_to_editor(content){

		var ed = tinyMCE.activeEditor;
		ed.execCommand('mceInsertContent',false,content);
}
<?php $this->Html->scriptEnd(); ?>