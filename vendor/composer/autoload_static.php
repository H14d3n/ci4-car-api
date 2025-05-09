<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45cb116f5bd8cfefb7ebd271761fd76b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CodeIgniter\\Shield\\' => 19,
            'CodeIgniter\\Settings\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CodeIgniter\\Shield\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeigniter4/shield/src',
        ),
        'CodeIgniter\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeigniter4/settings/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45cb116f5bd8cfefb7ebd271761fd76b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45cb116f5bd8cfefb7ebd271761fd76b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45cb116f5bd8cfefb7ebd271761fd76b::$classMap;

        }, null, ClassLoader::class);
    }
}
