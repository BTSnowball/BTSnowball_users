<?php
Wind::import('WIND:cache.AbstractWindCache');
/**
 * ApcCache缓存策略实现类
 * 
 * ApcCache继承AbstractWindCache类,并实现该类的提供的各自操作接口.
 * 提供对方访问接口如下:
 * <ul>
 *   <li>set($key, $value, $expire): 继承自{@link AbstractWindCache::set()}.</li>
 *   <li>get($key): 继承自{@link AbstractWindCache::get()}.</li>
 *   <li>delete($key): 继承自{@link AbstractWindCache::delete()}.</li>
 *   <li>batchGet($keys): 继承自{@link AbstractWindCache::batchGet()}.</li>
 *   <li>batchDelete($keys): 继承自{@link AbstractWindCache::batchDelete()}.</li>
 *   <li>setConfig($config): 继承自{@link AbstractWindCache::setConfig()}.</li>
 * </ul>
 * 该缓存策略从AbstractWindCache类中继承三个配置项：
 * <code>
 *  array(
 *  	'security-code' => '',	//继承自AbstractWindCache,安全码配置
 * 		'key-prefix' => '',		//继承自AbstractWindCache,缓存key前缀
 *      'expires' => '0',	//继承自AbstractWindCache,缓存过期时间配置
 *  )
 * </code>
 * <i>使用方式：</i><br/>
 * 1、您可以像使用普通的类一样使用该组件,如下:
 * <code>
 * Wind::import('WIND:cache.strategy.WindApcCache');
 * $cache = new WindApcCache();
 * $cache->set('name', 'windframework');
 * </code>
 * 
 * 2、同时作为组件,WindApcCache也允许用户通过组件配置得方式,通过框架的组件机制来获得该缓存对象进行操作.
 * 在应用配置中的组件配置块(components),配置使用该组件如下：
 * <code>
 *  'apcCache' => array(
 *		'path' => 'WIND:cache.strategy.WindApcCache',
 *		'scope' => 'singleton',
 *		'config' => array(
 *			'security-code' => '', 
 * 	    	'key-prefix' => '',
 *      	'expires' => '0',
 *		),
 *	),
 * </code>
 * 在应用中通过如下方式使用:
 * <code>
 * $cache = Wind::getComponent('apcCache');	//注意这里的apcCache组件名称和配置的组件名称需要对应
 * $cache->set('name', 'wf');
 * </code>
 * 关于组件配置的相关说明请参考组件配置一章.
 * 
 * <note><b>注意: </b>要使用ApcCache组件,需要安装apc扩展支持.</note>
 * 
 * the last known user to change this file in the repository  <LastChangedBy: xiaoxiao >
 * @author xiaoxiao <xiaoxia.xuxx@aliyun-inc.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id: WindApcCache.php 3791 2012-10-30 04:01:29Z liusanbian $
 * @package strategy
 */
class WindApcCache extends AbstractWindCache {

	/* (non-PHPdoc)
	 * @see AbstractWindCache::setValue()
	 */
	protected function setValue($key, $value, $expires = 0) {
		return apc_store($key, $value, $expires);
	}

	/* (non-PHPdoc)
	 * @see AbstractWindCache::getValue()
	 */
	protected function getValue($key) {
		return apc_fetch($key);
	}

	/* (non-PHPdoc)
	 * @see AbstractWindCache::deleteValue()
	 */
	protected function deleteValue($key) {
		return apc_delete($key);
	}

	/*(non-PHPdoc)
	 * @see AbstractWindCache::clear()
	 */
	public function clear() {
		return apc_clear_cache('user');
	}
	
	/* (non-PHPdoc)
	 * @see AbstractWindCache::addValue()
	 */
	public function addValue($key, $value, $expires = 0) {
		return apc_add($key, $value, $expires);
	}
}