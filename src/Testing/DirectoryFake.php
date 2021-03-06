<?php

namespace LdapRecord\Testing;

use LdapRecord\Container;

class DirectoryFake
{
    /**
     * Setup the fake connection.
     *
     * @param string|null $name
     *
     * @throws \LdapRecord\ContainerException
     *
     * @return ConnectionFake
     */
    public static function setup($name = null)
    {
        $connection = Container::getConnection($name);

        $fake = static::makeConnectionFake($connection->getConfiguration()->all());

        // Replace the connection with a fake.
        Container::addConnection($fake, $name);

        return $fake;
    }

    /**
     * Make a connection fake.
     *
     * @param array $config
     *
     * @return ConnectionFake
     */
    public static function makeConnectionFake(array $config = [])
    {
        return ConnectionFake::make($config);
    }
}
