<?php

namespace Plugin\CategoryProductBlock;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CategoryProductBlockBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        
        error_log('[CategoryProductBlock][Bundle] Bundle built successfully');
    }
    
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}