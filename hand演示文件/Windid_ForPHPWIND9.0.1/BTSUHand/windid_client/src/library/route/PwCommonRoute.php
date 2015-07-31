<?php
Wind::import('WIND:router.route.AbstractWindRoute');
/**
 * 普通前台路由，供后台框架使用
 *
 * @author Shi Long <long.shi@alibaba-inc.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id: PwCommonRoute.php 24507 2013-01-31 06:36:19Z long.shi $
 * @package library
*/
class PwCommonRoute extends AbstractWindRoute {
	/* (non-PHPdoc)
	 * @see AbstractWindRoute::build()
	 */
	public function build($router, $action, $args = array()) {
		list($_a, $_c, $_m, $args) = WindUrlHelper::resolveAction($action, $args);
		if ($_m && $_m !== $router->getDefaultModule()) $args[$router->getModuleKey()] = $_m;
		if ($_c && $_c !== $router->getDefaultController()) $args[$router->getControllerKey()] = $_c;
		if ($_a && $_a !== $router->getDefaultAction()) $args[$router->getActionKey()] = $_a;
		$_url = 'index.php?' . WindUrlHelper::argsToUrl($args);
		return $_url;
	}

	/* (non-PHPdoc)
	 * @see AbstractWindRoute::match()
	 */
	 public function match($request) {
	 	$path = $request->getPathInfo();
		return WindUrlHelper::urlToArgs($path);
	}
	
}

?>