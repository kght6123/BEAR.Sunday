<?php
/**
 * BEAR.Framework
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Framework\Module\Extension;

use Ray\Di\Scope;
use Ray\Di\AbstractModule;
use Ray\Di\Injector;
use Ray\Aop\Interceptor;

/**
 * View module
 *
 * @package    BEAR.Framework
 * @subpackage Module
 */
class ViewModule extends AbstractModule
{
    /**
     * Constructor
     *
     * @param Interceptor[] $interceptors
     */
    public function __construct(array $htmlInterceptors)
    {
        $this->htmlInterceptors = $htmlInterceptors;
        parent::__construct();
    }

    /**
     * Configure
     *
     * @return void
     */
    protected function configure()
    {
        $this->bind('BEAR\Resource\Renderable')->to('BEAR\Framework\Resource\View\Renderer');
        $this->bind('BEAR\Framework\Interceptor\ViewAdapter\Renderable')->to('BEAR\Framework\Interceptor\ViewAdapter\SmartyBackEnd');
//         $this->bindInterceptor(
//             $this->matcher->annotatedWith('BEAR\Framework\Annotation\Html'),
//             $this->matcher->any(),
//             $this->htmlInterceptors
//         );
    }
}