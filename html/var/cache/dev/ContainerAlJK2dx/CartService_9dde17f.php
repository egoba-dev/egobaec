<?php

namespace ContainerAlJK2dx;
include_once \dirname(__DIR__, 4).'/src/Eccube/Service/CartService.php';

class CartService_9dde17f extends \Eccube\Service\CartService implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Eccube\Service\CartService|null wrapped object, if the proxy is initialized
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

    public function getCarts($empty_delete = false)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getCarts', array('empty_delete' => $empty_delete), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getCarts($empty_delete);
    }

    public function getPersistedCarts()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getPersistedCarts', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getPersistedCarts();
    }

    public function getSessionCarts()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getSessionCarts', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getSessionCarts();
    }

    public function mergeFromPersistedCart()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'mergeFromPersistedCart', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->mergeFromPersistedCart();
    }

    public function getCart()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getCart', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getCart();
    }

    public function addProduct($ProductClass, $quantity = 1)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'addProduct', array('ProductClass' => $ProductClass, 'quantity' => $quantity), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->addProduct($ProductClass, $quantity);
    }

    public function removeProduct($ProductClass)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'removeProduct', array('ProductClass' => $ProductClass), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->removeProduct($ProductClass);
    }

    public function save()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'save', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->save();
    }

    public function setPreOrderId($pre_order_id)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'setPreOrderId', array('pre_order_id' => $pre_order_id), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->setPreOrderId($pre_order_id);
    }

    public function getPreOrderId()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'getPreOrderId', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->getPreOrderId();
    }

    public function clear()
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'clear', array(), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->clear();
    }

    public function setCartItemComparator($cartItemComparator)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'setCartItemComparator', array('cartItemComparator' => $cartItemComparator), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->setCartItemComparator($cartItemComparator);
    }

    public function setPrimary($cartKey)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, 'setPrimary', array('cartKey' => $cartKey), $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        return $this->valueHolder11213->setPrimary($cartKey);
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

        unset($instance->carts, $instance->session, $instance->entityManager, $instance->cart, $instance->productClassRepository, $instance->cartRepository, $instance->cartItemComparator, $instance->cartItemAllocator, $instance->orderRepository, $instance->tokenStorage, $instance->authorizationChecker);

        $instance->initializerdf525 = $initializer;

        return $instance;
    }

    public function __construct(\Symfony\Component\HttpFoundation\Session\SessionInterface $session, \Doctrine\ORM\EntityManagerInterface $entityManager, \Eccube\Repository\ProductClassRepository $productClassRepository, \Eccube\Repository\CartRepository $cartRepository, \Eccube\Service\Cart\CartItemComparator $cartItemComparator, \Eccube\Service\Cart\CartItemAllocator $cartItemAllocator, \Eccube\Repository\OrderRepository $orderRepository, \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage, \Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface $authorizationChecker)
    {
        static $reflection;

        if (! $this->valueHolder11213) {
            $reflection = $reflection ?? new \ReflectionClass('Eccube\\Service\\CartService');
            $this->valueHolder11213 = $reflection->newInstanceWithoutConstructor();
        unset($this->carts, $this->session, $this->entityManager, $this->cart, $this->productClassRepository, $this->cartRepository, $this->cartItemComparator, $this->cartItemAllocator, $this->orderRepository, $this->tokenStorage, $this->authorizationChecker);

        }

        $this->valueHolder11213->__construct($session, $entityManager, $productClassRepository, $cartRepository, $cartItemComparator, $cartItemAllocator, $orderRepository, $tokenStorage, $authorizationChecker);
    }

    public function & __get($name)
    {
        $this->initializerdf525 && ($this->initializerdf525->__invoke($valueHolder11213, $this, '__get', ['name' => $name], $this->initializerdf525) || 1) && $this->valueHolder11213 = $valueHolder11213;

        if (isset(self::$publicProperties8e111[$name])) {
            return $this->valueHolder11213->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\CartService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\CartService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\CartService');

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

        $realInstanceReflection = new \ReflectionClass('Eccube\\Service\\CartService');

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
        unset($this->carts, $this->session, $this->entityManager, $this->cart, $this->productClassRepository, $this->cartRepository, $this->cartItemComparator, $this->cartItemAllocator, $this->orderRepository, $this->tokenStorage, $this->authorizationChecker);
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

if (!\class_exists('CartService_9dde17f', false)) {
    \class_alias(__NAMESPACE__.'\\CartService_9dde17f', 'CartService_9dde17f', false);
}
