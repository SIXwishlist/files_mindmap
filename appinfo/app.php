<?php
$eventDispatcher = \OC::$server->getEventDispatcher();

if (\OC::$server->getUserSession()->isLoggedIn()) {
	$eventDispatcher->addListener('OCA\Files::loadAdditionalScripts', function() {
		OCP\Util::addStyle('files_mindmap', 'style');
		OCP\Util::addScript('files_mindmap', 'mindmap');

		$cspManager = \OC::$server->getContentSecurityPolicyManager();
		$csp = new \OCP\AppFramework\Http\ContentSecurityPolicy();
		$csp->addAllowedChildSrcDomain("'self'");
		$cspManager->addDefaultPolicy($csp);
	});
}