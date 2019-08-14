RichSnippet_jQuery( document ).ready(function() {
	setTimeout(function() { NewsModules_RichSnippet_CheckReady(); }, 1000);
});

function NewsModules_RichSnippet_CheckReady()
{
	if (RichSnippet_jQuery('select#group_4richsnippet_category').is('*'))
	{
		setTimeout(function() { NewsModules_RichSnippet_Init(); }, 1000);
	}
	else
	{
		setTimeout(function() { NewsModules_RichSnippet_CheckReady(); }, 1000);
	}
}

function NewsModules_RichSnippet_Init()
{
	RichSnippet_jQuery('select#group_4richsnippet_category').focus(function() {
		if (!RichSnippet_jQuery(this).hasClass('ready'))
		{
			var text_node = RichSnippet_jQuery('<p />').attr('id', 'richsnippet_category_text');
			var node = RichSnippet_jQuery('select#group_4richsnippet_category');
			node.attr('size', 10).css('width', '100%');
			node.parent().append(text_node);
			
			node.change(function() {
				NewsModules_RichSnippet_DisplayCategoryName();
			})
			.keydown(function() {
				NewsModules_RichSnippet_DisplayCategoryName();
			});
			
			RichSnippet_jQuery(this).addClass('ready');
		}
	});
}

function NewsModules_RichSnippet_DisplayCategoryName()
{
	var node = RichSnippet_jQuery('select#group_4richsnippet_category');
	var val = node.val();
	var text = node.find("[value='"+val+"']").text();
	RichSnippet_jQuery('#richsnippet_category_text').html(text);
}