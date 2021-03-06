<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60ffb5c550cd1d8c1304ee91c04b65b7
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60ffb5c550cd1d8c1304ee91c04b65b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60ffb5c550cd1d8c1304ee91c04b65b7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
