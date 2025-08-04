<?php

namespace ContainerAlJK2dx;
include_once \dirname(__DIR__, 4).'/src/Eccube/Service/TaxRuleService.php';

class TaxRuleService_289f969 extends \Eccube\Service\TaxRuleService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Eccube\Service\TaxRuleService|null wrapped object, if the proxy is initialized
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

    public function getTax($price, $product = null, $productClass = null, $pref = null, $country = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getTax', array('price' => $price, 'product' => $product, 'productClass' => $productClass, 'pref' => $pref, 'country' => $country), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getTax($price, $product, $productClass, $pref, $country);
    }

    public function getPriceIncTax($price, $product = null, $productClass = null, $pref = null, $country = null)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getPriceIncTax', array('price' => $price, 'product' => $product, 'productClass' => $productClass, 'pref' => $pref, 'country' => $country), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getPriceIncTax($price, $product, $productClass, $pref, $country);
    }

    public function calcTax($price, $taxRate, $RoundingType, $taxAdjust = 0)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'calcTax', array('price' => $price, 'taxRate' => $taxRate, 'RoundingType' => $RoundingType, 'taxAdjust' => $taxAdjust), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->calcTax($price, $taxRate, $RoundingType, $taxAdjust);
    }

    public function calcTaxIncluded($price, $taxRate, $RoundingType, $taxAdjust = 0)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'calcTaxIncluded', array('price' => $price, 'taxRate' => $taxRate, 'RoundingType' => $RoundingType, 'taxAdjust' => $taxAdjust), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->calcTaxIncluded($price, $taxRate, $RoundingType, $taxAdjust);
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

        unset($instance->BaseInfo, $instance->taxRuleRepository);

        $instance->initializerdf525 = $initializer;

        return $instance;
    }

    public function __construct(\Eccube\Repository\TaxRuleRepository $taxRuleRepository, \Eccube\Repository\BaseInfoRepository $baseInfoRepository)
    {
        static $reflection;

        if (! $this->valueHolder11213) {
            $reflection = $reflection ?? new \ReflectionClass('Eccube\\Service\\TaxRuleService');
            $this->valueHolder11213 = $reflection->newInstanceWithoutConstructor();
        unset($this->BaseInfo, $this->taxRuleRepository);

        }

        $this->valueHolder11213->__construct($taxRuleRepository, $baseInfoRepository);
    }

    public function & __get($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__get', ['name' => $name], $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        if (isset(self::$publicProperties8e111[$name])) {
            return $this->valueHolder11213->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\TaxRuleService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\TaxRuleService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\TaxRuleService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\TaxRuleService');

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
        unset($this->BaseInfo, $this->taxRuleRepository);
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

if (!\class_exists('TaxRuleService_289f969', false)) {
    \class_alias(__NAMESPACE__.'\\TaxRuleService_289f969', 'TaxRuleService_289f969', false);
}
