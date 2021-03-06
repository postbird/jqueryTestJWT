<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80baaa7ddbd60a10dd28d23ae1e99076
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lcobucci\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit80baaa7ddbd60a10dd28d23ae1e99076::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit80baaa7ddbd60a10dd28d23ae1e99076::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
