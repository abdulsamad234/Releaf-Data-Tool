<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb72d00d0d16f284d9b8efcc9478be8b7
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Csv\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Csv\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/csv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb72d00d0d16f284d9b8efcc9478be8b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb72d00d0d16f284d9b8efcc9478be8b7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
