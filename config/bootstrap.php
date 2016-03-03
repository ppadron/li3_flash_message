<?php

use li3_flash_message\extensions\storage\FlashMessage;

\lithium\aop\Filters::apply('\lithium\action\Dispatcher', '_callable', function($params, $next) {
	$object = $next($params);

	if (is_a($object, 'lithium\action\Controller')) {
		return FlashMessage::bindTo($object);
	}

	return $object;
});

?>