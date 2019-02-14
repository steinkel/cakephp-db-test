<?php

namespace DbTest\Engine;

use DbTest\Engine\Traits\ExecuteTrait;

abstract class BaseEngine
{
    use ExecuteTrait;

    /**
     * Show commands and results on execution
     *
     * @var bool
     */
    protected $_verbose = false;

    /**
     * Database configuration
     *
     * @var bool
     */
    protected $_database = [];

    /**
     * Constructor method
     *
     * @param $database
     * @return void
     */
    public function __construct($database)
    {
        $this->_database = $database;
    }

    /**
     * Recreates test database.
     *
     * @param array $database Database configuration.
     * @return bool
     */
    abstract public function recreateTestDatabase();

    /**
     * Import test skeleton database.
     *
     * @param array  $database Database configuration.
     * @param string $file     Sql file path.
     * @param array  $options  Additional options/
     * @return bool
     */
    abstract public function import($file, $options = []);

    /**
     * Export database.
     *
     * @param array  $database Database configuration.
     * @param string $file     Sql file path.
     * @param array  $options  Additional options/
     * @return bool
     */
    abstract public function export($file, $options = []);

    /**
     * Check if success.
     *
     * @param int $check Check value
     * @return bool
     */
    public function isSuccess($check)
    {
        $allowed = [
            0 => true,
            1 => true,
        ];

        return isset($allowed[$check]) && $allowed[$check];
    }

    /**
     * Create schema
     *
     * @param array $database Database configuration.
     * @return bool
     */
    public function createSchema()
    {
        return true;
    }
}
