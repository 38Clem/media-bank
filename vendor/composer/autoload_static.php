<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69c035f3028f7e15c88457bd39048914
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69c035f3028f7e15c88457bd39048914::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69c035f3028f7e15c88457bd39048914::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
