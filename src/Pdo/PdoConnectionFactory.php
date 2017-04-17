<?php

declare(strict_types=1);

namespace App\Pdo;

use Interop\Config\ConfigurationTrait;
use Interop\Config\RequiresConfig;
use Interop\Config\RequiresMandatoryOptions;
use PDO;
use Psr\Container\ContainerInterface;

class PdoConnectionFactory implements RequiresConfig, RequiresMandatoryOptions
{
    use ConfigurationTrait;

    /**
     * @var array
     */
    private $driverSchemeAliases = [
        'pdo_mysql' => 'mysql',
        'pdo_pgsql' => 'pgsql',
    ];

    private $driverSchemeSeparators = [
        'pdo_mysql' => ';',
        'pdo_pgsql' => ' ',
    ];

    public function __invoke(ContainerInterface $container): PDO
    {
        $config    = $this->options($container->get('config'));
        $separator = $this->driverSchemeSeparators[$config['driver']];
        $dsn       = $this->driverSchemeAliases[$config['driver']] . ':';
        $dsn       .= 'host=' . $config['host'] . $separator;
        $dsn       .= 'port=' . $config['port'] . $separator;
        $dsn       .= 'dbname=' . $config['dbname'] . $separator;
        $dsn       = rtrim($dsn);
        $user      = $config['user'];
        $password  = $config['password'];

        return new PDO($dsn, $user, $password, $config['options']);
    }

    public function dimensions(): iterable
    {
        return ['app', 'pdo_connection'];
    }

    public function mandatoryOptions(): iterable
    {
        return [
            'driver',
            'user',
            'password',
            'host',
            'dbname',
            'port',
            'options',
        ];
    }
}
