<?php

namespace Container1V1QCkx;
include_once \dirname(__DIR__, 4).'/src/Eccube/Service/Composer/ComposerServiceInterface.php';
include_once \dirname(__DIR__, 4).'/src/Eccube/Service/Composer/ComposerApiService.php';

class ComposerApiService_c77e330 extends \Eccube\Service\Composer\ComposerApiService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Eccube\Service\Composer\ComposerApiService|null wrapped object, if the proxy is initialized
     */
    private $valueHolder11213 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerdf525 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties8e111 = [
        
    ];

    public function execInfo($pluginName, $version)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execInfo', array('pluginName' => $pluginName, 'version' => $version), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execInfo($pluginName, $version);
    }

    public function execRequire($packageName, $output = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execRequire', array('packageName' => $packageName, 'output' => $output), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execRequire($packageName, $output);
    }

    public function execRemove($packageName, $output = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execRemove', array('packageName' => $packageName, 'output' => $output), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execRemove($packageName, $output);
    }

    public function execUpdate($dryRun, $output = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execUpdate', array('dryRun' => $dryRun, 'output' => $output), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execUpdate($dryRun, $output);
    }

    public function execInstall($dryRun, $output = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execInstall', array('dryRun' => $dryRun, 'output' => $output), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execInstall($dryRun, $output);
    }

    public function foreachRequires($packageName, $version, $callback, $typeFilter = null, $level = 0) : void
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'foreachRequires', array('packageName' => $packageName, 'version' => $version, 'callback' => $callback, 'typeFilter' => $typeFilter, 'level' => $level), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $this->valueHolder11213->foreachRequires($packageName, $version, $callback, $typeFilter, $level);
return;
    }

    public function execConfig($key, $value = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'execConfig', array('key' => $key, 'value' => $value), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->execConfig($key, $value);
    }

    public function getConfig()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getConfig', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getConfig();
    }

    public function setWorkingDir($workingDir)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'setWorkingDir', array('workingDir' => $workingDir), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->setWorkingDir($workingDir);
    }

    public function runCommand($commands, $output = null, $init = true)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'runCommand', array('commands' => $commands, 'output' => $output, 'init' => $init), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->runCommand($commands, $output, $init);
    }

    public function configureRepository(\Eccube\Entity\BaseInfo $BaseInfo) : void
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'configureRepository', array('BaseInfo' => $BaseInfo), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $this->valueHolder11213->configureRepository($BaseInfo);
return;
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        unset($instance->eccubeConfig);

        \Closure::bind(function (\Eccube\Service\Composer\ComposerApiService $instance) {
            unset($instance->consoleApplication, $instance->workingDir, $instance->baseInfoRepository, $instance->schemaService, $instance->pluginContext);
        }, $instance, 'Eccube\\Service\\Composer\\ComposerApiService')->__invoke($instance);

        $instance->initializerdf525 = $initializer;

        return $instance;
    }

    public function __construct(\Eccube\Common\EccubeConfig $eccubeConfig, \Eccube\Repository\BaseInfoRepository $baseInfoRepository, \Eccube\Service\SchemaService $schemaService, \Eccube\Service\PluginContext $pluginContext)
    {
        static $reflection;

        if (! $this->valueHolder11213) {
            $reflection = $reflection ?? new \ReflectionClass('Eccube\\Service\\Composer\\ComposerApiService');
            $this->valueHolder11213 = $reflection->newInstanceWithoutConstructor();
        unset($this->eccubeConfig);

        \Closure::bind(function (\Eccube\Service\Composer\ComposerApiService $instance) {
            unset($instance->consoleApplication, $instance->workingDir, $instance->baseInfoRepository, $instance->schemaService, $instance->pluginContext);
        }, $this, 'Eccube\\Service\\Composer\\ComposerApiService')->__invoke($this);

        }

        $this->valueHolder11213->__construct($eccubeConfig, $baseInfoRepository, $schemaService, $pluginContext);
    }

    public function & __get($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__get', ['name' => $name], $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        if (isset(self::$publicProperties8e111[$name])) {
            return $this->valueHolder11213->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\Composer\\ComposerApiService');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder11213;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder11213;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\Composer\\ComposerApiService');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder11213;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder11213;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__isset', array('name' => $name), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\Composer\\ComposerApiService');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder11213;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder11213;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__unset', array('name' => $name), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\Composer\\ComposerApiService');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder11213;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder11213;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__clone', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        $this->valueHolder11213 = clone $this->valueHolder11213;
    }

    public function __sleep()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__sleep', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return array('valueHolder11213');
    }

    public function __wakeup()
    {
        unset($this->eccubeConfig);

        \Closure::bind(function (\Eccube\Service\Composer\ComposerApiService $instance) {
            unset($instance->consoleApplication, $instance->workingDir, $instance->baseInfoRepository, $instance->schemaService, $instance->pluginContext);
        }, $this, 'Eccube\\Service\\Composer\\ComposerApiService')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerdf525 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerdf525;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'initializeProxy', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder11213;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder11213;
    }
}

if (!\class_exists('ComposerApiService_c77e330', false)) {
    \class_alias(__NAMESPACE__.'\\ComposerApiService_c77e330', 'ComposerApiService_c77e330', false);
}
