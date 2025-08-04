<?php

namespace ContainerAlJK2dx;
include_once \dirname(__DIR__, 4).'/src/Eccube/Repository/TaxRuleRepository.php';

class TaxRuleRepository_f7111db extends \Eccube\Repository\TaxRuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Eccube\Repository\TaxRuleRepository|null wrapped object, if the proxy is initialized
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

    public function newTaxRule()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'newTaxRule', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->newTaxRule();
    }

    public function getByRule($Product = null, $ProductClass = null, $Pref = null, $Country = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getByRule', array('Product' => $Product, 'ProductClass' => $ProductClass, 'Pref' => $Pref, 'Country' => $Country), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getByRule($Product, $ProductClass, $Pref, $Country);
    }

    public function getList()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getList', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getList();
    }

    public function delete($TaxRule)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'delete', array('TaxRule' => $TaxRule), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->delete($TaxRule);
    }

    public function clearCache()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'clearCache', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->clearCache();
    }

    public function save($entity)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'save', array('entity' => $entity), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->save($entity);
    }

    public function createQueryBuilder($alias, $indexBy = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createQueryBuilder', array('alias' => $alias, 'indexBy' => $indexBy), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createQueryBuilder($alias, $indexBy);
    }

    public function createResultSetMappingBuilder($alias)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createResultSetMappingBuilder', array('alias' => $alias), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createResultSetMappingBuilder($alias);
    }

    public function createNamedQuery($queryName)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createNamedQuery', array('queryName' => $queryName), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createNamedQuery($queryName);
    }

    public function createNativeNamedQuery($queryName)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'createNativeNamedQuery', array('queryName' => $queryName), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->createNativeNamedQuery($queryName);
    }

    public function clear()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'clear', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->clear();
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'find', array('id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->find($id, $lockMode, $lockVersion);
    }

    public function findAll()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'findAll', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->findAll();
    }

    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'findBy', array('criteria' => $criteria, 'orderBy' => $orderBy, 'limit' => $limit, 'offset' => $offset), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findOneBy(array $criteria, ?array $orderBy = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'findOneBy', array('criteria' => $criteria, 'orderBy' => $orderBy), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->findOneBy($criteria, $orderBy);
    }

    public function count(array $criteria)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'count', array('criteria' => $criteria), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->count($criteria);
    }

    public function __call($method, $arguments)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__call', array('method' => $method, 'arguments' => $arguments), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->__call($method, $arguments);
    }

    public function getClassName()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getClassName', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getClassName();
    }

    public function matching(\Doctrine\Common\Collections\Criteria $criteria)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'matching', array('criteria' => $criteria), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->matching($criteria);
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

        unset($instance->baseInfo, $instance->authorizationChecker, $instance->tokenStorage, $instance->eccubeConfig, $instance->_entityName, $instance->_em, $instance->_class);

        \Closure::bind(function (\Eccube\Repository\TaxRuleRepository $instance) {
            unset($instance->rules);
        }, $instance, 'Eccube\\Repository\\TaxRuleRepository')->__invoke($instance);

        $instance->initializerdf525 = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry, \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage, \Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface $authorizationChecker, \Eccube\Repository\BaseInfoRepository $baseInfoRepository, \Eccube\Common\EccubeConfig $eccubeConfig)
    {
        static $reflection;

        if (! $this->valueHolder11213) {
            $reflection = $reflection ?? new \ReflectionClass('Eccube\\Repository\\TaxRuleRepository');
            $this->valueHolder11213 = $reflection->newInstanceWithoutConstructor();
        unset($this->baseInfo, $this->authorizationChecker, $this->tokenStorage, $this->eccubeConfig, $this->_entityName, $this->_em, $this->_class);

        \Closure::bind(function (\Eccube\Repository\TaxRuleRepository $instance) {
            unset($instance->rules);
        }, $this, 'Eccube\\Repository\\TaxRuleRepository')->__invoke($this);

        }

        $this->valueHolder11213->__construct($registry, $tokenStorage, $authorizationChecker, $baseInfoRepository, $eccubeConfig);
    }

    public function & __get($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__get', ['name' => $name], $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        if (isset(self::$publicProperties8e111[$name])) {
            return $this->valueHolder11213->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Eccube\\Repository\\TaxRuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Repository\\TaxRuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Repository\\TaxRuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Repository\\TaxRuleRepository');

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
        unset($this->baseInfo, $this->authorizationChecker, $this->tokenStorage, $this->eccubeConfig, $this->_entityName, $this->_em, $this->_class);

        \Closure::bind(function (\Eccube\Repository\TaxRuleRepository $instance) {
            unset($instance->rules);
        }, $this, 'Eccube\\Repository\\TaxRuleRepository')->__invoke($this);
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

if (!\class_exists('TaxRuleRepository_f7111db', false)) {
    \class_alias(__NAMESPACE__.'\\TaxRuleRepository_f7111db', 'TaxRuleRepository_f7111db', false);
}
