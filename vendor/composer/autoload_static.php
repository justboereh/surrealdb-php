<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c42ba097b2f68ea8255d6d4c4fe07e4
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hidehalo\\Nanoid\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hidehalo\\Nanoid\\' => 
        array (
            0 => __DIR__ . '/..' . '/hidehalo/nanoid-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c42ba097b2f68ea8255d6d4c4fe07e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c42ba097b2f68ea8255d6d4c4fe07e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c42ba097b2f68ea8255d6d4c4fe07e4::$classMap;

        }, null, ClassLoader::class);
    }
}