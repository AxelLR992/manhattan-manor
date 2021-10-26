<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita1cddcdd9e327e0784a6965c97817f69
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita1cddcdd9e327e0784a6965c97817f69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita1cddcdd9e327e0784a6965c97817f69::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita1cddcdd9e327e0784a6965c97817f69::$classMap;

        }, null, ClassLoader::class);
    }
}
