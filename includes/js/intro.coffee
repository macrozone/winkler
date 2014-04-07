jQuery ($) ->
	
	$intro = $ "<div id='intro'><div class='logo'></div><div class='layer layer-1'></div><div class='layer layer-2'></div></div>"

	$intro.appendTo $ "body"
	gone = false
	hide = ->
		unless gone
			gone = true
			$intro.addClass "hiding"

			setTimeout ->	
				$intro.remove()
			,10000

	$intro.on "click", hide
	#setTimeout hide, 3000


