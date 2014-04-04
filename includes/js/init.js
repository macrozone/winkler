jQuery(function($)
{
	var autoSetHashEnabled = true;

	var selectPageInMenu = function(page)
	{
		$("#main-menu a").removeClass("active");
		$("#main-menu a[href='#"+page+"']").addClass("active");
	}
	$(document).on('scroll',_.throttle(function(e){
		if(autoSetHashEnabled)
		{
			var offset = $(window).height()/2;
			$('section.page.depth-0').each(function(){
				if ($(this).offset().top < window.pageYOffset + offset && $(this).offset().top + $(this).height() > window.pageYOffset + offset) 
				{
					var id = $(this).attr('id');
					if(id)
					{
						page = id.substring(5);
						selectPageInMenu(page);
						window.location.hash = page;
					}
					else
					{
						window.location.hash = "";
						selectPageInMenu("");
					}
				}

			});
		}
	},300));
	var adjustHeight = function(index, element)
	{

		var height = $(window).height();
		if (index == 0)
			height -= $(element).offset().top ; // 20 tbd
		$(element).css("min-height", height);
	}
	var adjustPageHeights = function()
	{

		$(".page.depth-0").each(adjustHeight);
	}
	var scrollToPage = function(page)
	{
		autoSetHashEnabled = false;
		selectPageInMenu(page);
		var $target = $("#page_"+page);

		if($target.length > 0)
		{

			jQuery.scrollTo($target, "slow", {offset: -100, onAfter:function()
				{
					_.delay(function()
						{
								autoSetHashEnabled = true;
						},300);
				
				}});
		}
	}
	$("#main-menu li a").on("click", function()
	{
		$("body").removeClass("menu-visible");
		var target = $(this).attr("href").substring(1);
		scrollToPage(target)
	});

	$("#menu-button, #masthead .logo").on("click", function()
	{

		$("body").toggleClass("menu-visible");
		return false;
	});


	Hammer(document.getElementById("menu-button")).on("swipeleft", function()
	{

		if(!$("body").hasClass("menu-visible"))
		{

			$("body").addClass("menu-visible");
			return false;
		}
		else 
			return true;

	});

	Hammer(document.body).on("swiperight", function()
	{
		if($("body").hasClass("menu-visible"))
		{

			$("body").removeClass("menu-visible");
			return false;
		}
		else 
			return true;

	});
	$("body").on("click", function()
	{
		if($("body").hasClass("menu-visible"))
		{

			$("body").removeClass("menu-visible");
			return false;
		}
		else 
			return true;
	});

	$(".page.depth-2").on("click", ".pageTitle",function(event)
	{
		var $page = $(event.delegateTarget);
		var $content = $page.find(".content");

		var height = $content.find(".wrapper").outerHeight()+10;
		
		// little trick for max-height
		if($page.hasClass("open"))
		{
			$page.removeClass("open");
			$content.css("max-height",0);
		}
		else
		{

			$page.addClass("open");
			$content.css("height", "auto").css("max-height",height);
		}
		
		return false;
	});
	$(window).on("resize", _.debounce(adjustPageHeights,300));

	adjustPageHeights();
	scrollToPage(window.location.hash.substring(1))
	
});