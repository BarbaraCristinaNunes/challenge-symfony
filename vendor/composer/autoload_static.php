<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65e6ea6b93acca5e3da4bcc5464a63ab
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit65e6ea6b93acca5e3da4bcc5464a63ab::$classMap;

        }, null, ClassLoader::class);
    }
}
