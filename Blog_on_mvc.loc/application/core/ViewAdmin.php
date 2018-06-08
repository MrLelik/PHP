<?php

class ViewAdmin
{
	function generate($content_view, $data = null, $template_view = 'admin_template_view.php')
	{
		include 'application/views/' . $template_view;
	}
}