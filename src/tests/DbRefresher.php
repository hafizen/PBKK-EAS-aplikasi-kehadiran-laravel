<?php

namespace Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithConsole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use function config;
use function dd;
use function in_array;

class DbRefresher extends TestCase
{
    use InteractsWithConsole, RefreshDatabase;

    protected $app;

    /**
     * @param $app
     */
    public function __construct($app)
    {
        parent::__construct();
        $this->app = $app;
    }

    public static function refresh($app, array $seeder = []): DbRefresher
    {
        $class = new self($app);
        if (config('app.automated')) $class->populate($seeder);
        return $class;
    }

    private function populate(array $seeder)
    {
        Config::set('database.default', 'sqlite');
        Config::set('database.connections.sqlite.database', ':memory:');

        $this->refreshDatabase();
        $seeders = [];
        foreach ($seeder as $item) if (!in_array($item, $seeders)) $seeders[] = $item;
        $this->seed($seeders);
    }
}
