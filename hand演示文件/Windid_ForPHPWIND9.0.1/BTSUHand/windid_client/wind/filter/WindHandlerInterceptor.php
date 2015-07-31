<?php
/**
 * 拦截器基类
 * 
 * 该类是拦截器机制的核心实现，提供接口:
 * <ul>
 * <li>{@link preHandle()}: 抽象接口,前置操作,需要子类实现</li>
 * <li>{@link postHandle()}: 抽象接口,后置操作,需要子类实现</li>
 * <li>{@link handle()}： 入口接口,调用拦截器的实现.</li>
 * </ul>
 * 该拦截器需要配合拦截链WindHandlerInterceptorChain实现真正的拦截链.
 *
 * the last known user to change this file in the repository  <$LastChangedBy: yishuo $>
 * @author Qiong Wu <papa0924@gmail.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id: WindHandlerInterceptor.php 3113 2011-11-11 07:28:09Z yishuo $
 * @package filter
 */
abstract class WindHandlerInterceptor extends WindModule {
	/**
	 * 保存执行的结果 
	 *
	 * @var mixed
	 */
	protected $result = null;
	/**
	 * 保存拦截链
	 * 
	 * 用以传递控制到下一个拦截器
	 *
	 * @var WindHandlerInterceptorChain
	 */
	protected $interceptorChain = null;

	/**
	 * 拦截器的前置操作
	 * 
	 * @param mixed $var=.. 参数列表将会从handle接口中传递继承
	 * @return null|mixed 如果返回为null则将会继续执行下一个拦截器,如果返回不为null则会中断拦截链的执行
	 */
	abstract public function preHandle();

	/**
	 * 拦截器的后置操作
	 * 
	 * @param mixed $var=.. 参数列表将会从handle接口中传递继承
	 */
	abstract public function postHandle();

	/**
	 * 拦截器的执行入口
	 * 
	 * @param mixed $var=.. 该接口接受任意参数,并将依次传递给拦截器的前置和后置操作
	 * @return mixed 返回拦截链执行的最终结果
	 */
	public function handle() {
		$args = func_get_args();
		$this->result = call_user_func_array(array($this, 'preHandle'), $args);
		if ($this->result !== null) {
			return $this->result;
		}
		if (null !== ($handler = $this->interceptorChain->getHandler())) {
			$this->result = call_user_func_array(array($handler, 'handle'), $args);
		} else {
			$this->result = call_user_func_array(array($this->interceptorChain, 'handle'), $args);
		}
		call_user_func_array(array($this, 'postHandle'), $args);
		return $this->result;
	}

	/**
	 * 设置拦截链对象
	 * 
	 * @param WindHandlerInterceptorChain $interceptorChain
	 */
	public function setHandlerInterceptorChain($interceptorChain) {
		$this->interceptorChain = $interceptorChain;
	}
}
?>