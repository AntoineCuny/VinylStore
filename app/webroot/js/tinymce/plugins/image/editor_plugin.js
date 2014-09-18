(function(){

	tinymce.create('tinymce.plugins.image',{

		init : function(ed, url){

				ed.addCommand('open_image',function(){

					var url = ed.settings.image_explorer;
					var el = ed.selection.getNode();
					if(el.nodeName == 'IMG'){
						url = ed.settings.image_edit;
						// on ajoute les données de l'image 
						url += '?src='+ed.dom.getAttrib(el,'src')+'&alt='
						+ed.dom.getEttribute(el,'alt')+'&class='+ed.dom.getAttrib(el,
							'class');
						
					}
						ed.windowManager.open({
							file : ed.settings.image_explorer,
							id	: 'image',
							width : 1000,
							height : 600,
							inline : true,
							title : 'Insérer une image'

						},{
							plugin_url : url
						});
				});

				ed.addButton('image',{
					title : 'Insérer une image',
					cmd   : 'open_image'
				})

		}
	});

	tinymce.PluginManager.add('image',tinymce.plugins.image)

})();