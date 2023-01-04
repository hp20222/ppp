<?php
function open()
	{
	$f =  fopen('web.log' , 'a+');
	return $f;
	}

function close($f)
	{
		fclose($f);
	}

function log_query($str , $f)
	{
		$f =  fopen('web.log' , 'a+');
		fwrite($f, $str);
		fwrite($f, "\n");
	}
?>