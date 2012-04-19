<?php
/**
 * Logger
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace sandbox\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;
use BEAR\Framework\Log\LogInject;

/**
 * Log Interceptor
 *
 * @package    BEAR.Framework
 * @subpackage Interceptor
 */
class Log implements MethodInterceptor
{
    use LogInject;

    /**
     * (non-PHPdoc)
     * @see Ray\Aop.MethodInterceptor::invoke()
     */
    public function invoke(MethodInvocation $invocation)
    {
        $result = $invocation->proceed();
        $class = get_class($invocation->getThis());
        $input = $invocation->getArguments();
        $input = json_encode($input);
        $result .= PHP_EOL .  "[Log] target = $class, input = $input, result = $result" . PHP_EOL;
        return $result;
    }
}
