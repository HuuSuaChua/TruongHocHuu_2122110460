<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9beebc8bee198bf7b5417984c1c79fe9
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit9beebc8bee198bf7b5417984c1c79fe9', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9beebc8bee198bf7b5417984c1c79fe9', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9beebc8bee198bf7b5417984c1c79fe9::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
