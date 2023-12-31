<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc190b247a344a63f474139bb0b00ad93
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc190b247a344a63f474139bb0b00ad93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc190b247a344a63f474139bb0b00ad93::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc190b247a344a63f474139bb0b00ad93::$classMap;

        }, null, ClassLoader::class);
    }
}
