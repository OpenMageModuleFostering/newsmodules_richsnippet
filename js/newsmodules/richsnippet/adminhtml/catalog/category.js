RichSnippet_jQuery( document ).ready(function() {
	varienGlobalEvents.attachEventHandler('showTab', function() {
		NewsModules_RichSnippet_Init();
	});
});

function NewsModules_RichSnippet_Init()
{
	if (!RichSnippet_jQuery('select[id^="group_"][id$="richsnippet_category"]').hasClass('ready'))
	{
		var text_node = RichSnippet_jQuery('<p />').attr('id', 'richsnippet_category_text');
		var node = RichSnippet_jQuery('select[id^="group_"][id$="richsnippet_category"]');
		node.attr('size', 10).css('width', '100%');
		node.parent().append(text_node);
		
		node.change(function() {
			NewsModules_RichSnippet_DisplayCategoryName();
		})
		.keydown(function() {
			NewsModules_RichSnippet_DisplayCategoryName();
		});
		
		RichSnippet_jQuery('select[id^="group_"][id$="richsnippet_category"]').addClass('ready');
	}
}

function NewsModules_RichSnippet_DisplayCategoryName()
{
	var node = RichSnippet_jQuery('select[id^="group_"][id$="richsnippet_category"]');
	var val = node.val();
	var text = node.find("[value='"+val+"']").text();
	RichSnippet_jQuery('#richsnippet_category_text').html(text);
}