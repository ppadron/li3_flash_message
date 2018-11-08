<?php

use li3_flash_message\extensions\storage\FlashMessage;
use lithium\action\Dispatcher;
use lithium\aop\Filters;

Filters::apply(Dispatcher::class, '_callable', function($params, $next) {
	$object = $next($params);

	if (is_a($object, 'lithium\action\Controller')) {
		return FlashMessage::bindTo($object);
	}

	return $object;
});

?>