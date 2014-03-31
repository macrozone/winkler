jQuery(function($)
{

	$("#main-menu li a").on("click", function()
	{
		$("body").removeClass("menu-visible");
		var target = $(this).attr("href").substring(1);
		var $target = $(".page a[name='"+target+"']");
		jQuery.scrollTo($target, "slow");
	});

	$("#menu-button").on("click", function()
	{

		$("body").toggleClass("menu-visible");

	});

	$(".page.depth-2").on("click", ".pageTitle",function(event)
	{
		$(event.delegateTarget).toggleClass("open");
	});
});