<?php

namespace Container1V1QCkx;
include_once \dirname(__DIR__, 4).'/src/Eccube/Service/PluginService.php';

class PluginService_e75fd88 extends \Eccube\Service\PluginService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Eccube\Service\PluginService|null wrapped object, if the proxy is initialized
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

    public function install($path, $source = 0)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'install', array('path' => $path, 'source' => $source), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->install($path, $source);
    }

    public function installWithCode($code)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'installWithCode', array('code' => $code), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->installWithCode($code);
    }

    public function preInstall()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'preInstall', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->preInstall();
    }

    public function postInstall($config, $source)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'postInstall', array('config' => $config, 'source' => $source), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->postInstall($config, $source);
    }

    public function generateProxyAndUpdateSchema(\Eccube\Entity\Plugin $plugin, $config, $uninstall = false, $saveMode = true)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'generateProxyAndUpdateSchema', array('plugin' => $plugin, 'config' => $config, 'uninstall' => $uninstall, 'saveMode' => $saveMode), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->generateProxyAndUpdateSchema($plugin, $config, $uninstall, $saveMode);
    }

    public function generateProxyAndCallback(callable $callback, \Eccube\Entity\Plugin $plugin, $config, $uninstall = false, $tmpProxyOutputDir = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'generateProxyAndCallback', array('callback' => $callback, 'plugin' => $plugin, 'config' => $config, 'uninstall' => $uninstall, 'tmpProxyOutputDir' => $tmpProxyOutputDir), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->generateProxyAndCallback($callback, $plugin, $config, $uninstall, $tmpProxyOutputDir);
    }

    public function createTempDir()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createTempDir', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createTempDir();
    }

    public function deleteDirs($arr)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'deleteDirs', array('arr' => $arr), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->deleteDirs($arr);
    }

    public function unpackPluginArchive($archive, $dir)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'unpackPluginArchive', array('archive' => $archive, 'dir' => $dir), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->unpackPluginArchive($archive, $dir);
    }

    public function checkPluginArchiveContent($dir, array $config_cache = [])
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'checkPluginArchiveContent', array('dir' => $dir, 'config_cache' => $config_cache), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->checkPluginArchiveContent($dir, $config_cache);
    }

    public function readConfig($pluginDir)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'readConfig', array('pluginDir' => $pluginDir), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->readConfig($pluginDir);
    }

    public function checkSymbolName($string)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'checkSymbolName', array('string' => $string), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->checkSymbolName($string);
    }

    public function deleteFile($path)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'deleteFile', array('path' => $path), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->deleteFile($path);
    }

    public function checkSamePlugin($code)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'checkSamePlugin', array('code' => $code), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->checkSamePlugin($code);
    }

    public function calcPluginDir($code)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'calcPluginDir', array('code' => $code), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->calcPluginDir($code);
    }

    public function createPluginDir($d)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createPluginDir', array('d' => $d), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createPluginDir($d);
    }

    public function registerPlugin($meta, $source = 0)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'registerPlugin', array('meta' => $meta, 'source' => $source), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->registerPlugin($meta, $source);
    }

    public function callPluginManagerMethod($meta, $method)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'callPluginManagerMethod', array('meta' => $meta, 'method' => $method), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->callPluginManagerMethod($meta, $method);
    }

    public function uninstall(\Eccube\Entity\Plugin $plugin, $force = true)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'uninstall', array('plugin' => $plugin, 'force' => $force), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->uninstall($plugin, $force);
    }

    public function unregisterPlugin(\Eccube\Entity\Plugin $p)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'unregisterPlugin', array('p' => $p), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->unregisterPlugin($p);
    }

    public function disable(\Eccube\Entity\Plugin $plugin)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'disable', array('plugin' => $plugin), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->disable($plugin);
    }

    public function enable(\Eccube\Entity\Plugin $plugin, $enable = true)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'enable', array('plugin' => $plugin, 'enable' => $enable), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->enable($plugin, $enable);
    }

    public function update(\Eccube\Entity\Plugin $plugin, $path)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'update', array('plugin' => $plugin, 'path' => $path), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->update($plugin, $path);
    }

    public function updatePlugin(\Eccube\Entity\Plugin $plugin, $meta)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'updatePlugin', array('plugin' => $plugin, 'meta' => $meta), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->updatePlugin($plugin, $meta);
    }

    public function getPluginRequired($plugin)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getPluginRequired', array('plugin' => $plugin), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getPluginRequired($plugin);
    }

    public function findDependentPluginNeedDisable($pluginCode)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'findDependentPluginNeedDisable', array('pluginCode' => $pluginCode), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->findDependentPluginNeedDisable($pluginCode);
    }

    public function findDependentPlugin($pluginCode, $enableOnly = false)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'findDependentPlugin', array('pluginCode' => $pluginCode, 'enableOnly' => $enableOnly), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->findDependentPlugin($pluginCode, $enableOnly);
    }

    public function getDependentByCode($pluginCode, $libraryType = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getDependentByCode', array('pluginCode' => $pluginCode, 'libraryType' => $libraryType), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getDependentByCode($pluginCode, $libraryType);
    }

    public function parseToComposerCommand(array $packages, $getVersion = true)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'parseToComposerCommand', array('packages' => $packages, 'getVersion' => $getVersion), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->parseToComposerCommand($packages, $getVersion);
    }

    public function copyAssets($pluginCode)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'copyAssets', array('pluginCode' => $pluginCode), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->copyAssets($pluginCode);
    }

    public function removeAssets($pluginCode)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'removeAssets', array('pluginCode' => $pluginCode), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->removeAssets($pluginCode);
    }

    public function checkPluginExist($plugins, $pluginCode)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'checkPluginExist', array('plugins' => $plugins, 'pluginCode' => $pluginCode), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->checkPluginExist($plugins, $pluginCode);
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

        unset($instance->eccubeConfig, $instance->entityManager, $instance->pluginRepository, $instance->entityProxyService, $instance->schemaService, $instance->composerService, $instance->container, $instance->cacheUtil);

        \Closure::bind(function (\Eccube\Service\PluginService $instance) {
            unset($instance->projectRoot, $instance->environment, $instance->pluginApiService, $instance->systemService, $instance->pluginContext);
        }, $instance, 'Eccube\\Service\\PluginService')->__invoke($instance);

        $instance->initializerdf525 = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager, \Eccube\Repository\PluginRepository $pluginRepository, \Eccube\Service\EntityProxyService $entityProxyService, \Eccube\Service\SchemaService $schemaService, \Eccube\Common\EccubeConfig $eccubeConfig, \Symfony\Component\DependencyInjection\ContainerInterface $container, \Eccube\Util\CacheUtil $cacheUtil, \Eccube\Service\Composer\ComposerServiceInterface $composerService, \Eccube\Service\PluginApiService $pluginApiService, \Eccube\Service\SystemService $systemService, \Eccube\Service\PluginContext $pluginContext)
    {
        static $reflection;

        if (! $this->valueHolder11213) {
            $reflection = $reflection ?? new \ReflectionClass('Eccube\\Service\\PluginService');
            $this->valueHolder11213 = $reflection->newInstanceWithoutConstructor();
        unset($this->eccubeConfig, $this->entityManager, $this->pluginRepository, $this->entityProxyService, $this->schemaService, $this->composerService, $this->container, $this->cacheUtil);

        \Closure::bind(function (\Eccube\Service\PluginService $instance) {
            unset($instance->projectRoot, $instance->environment, $instance->pluginApiService, $instance->systemService, $instance->pluginContext);
        }, $this, 'Eccube\\Service\\PluginService')->__invoke($this);

        }

        $this->valueHolder11213->__construct($entityManager, $pluginRepository, $entityProxyService, $schemaService, $eccubeConfig, $container, $cacheUtil, $composerService, $pluginApiService, $systemService, $pluginContext);
    }

    public function & __get($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__get', ['name' => $name], $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        if (isset(self::$publicProperties8e111[$name])) {
            return $this->valueHolder11213->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\PluginService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\PluginService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\PluginService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\PluginService');

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
        unset($this->eccubeConfig, $this->entityManager, $this->pluginRepository, $this->entityProxyService, $this->schemaService, $this->composerService, $this->container, $this->cacheUtil);

        \Closure::bind(function (\Eccube\Service\PluginService $instance) {
            unset($instance->projectRoot, $instance->environment, $instance->pluginApiService, $instance->systemService, $instance->pluginContext);
        }, $this, 'Eccube\\Service\\PluginService')->__invoke($this);
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

if (!\class_exists('PluginService_e75fd88', false)) {
    \class_alias(__NAMESPACE__.'\\PluginService_e75fd88', 'PluginService_e75fd88', false);
}
