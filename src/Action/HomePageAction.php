<?php

declare(strict_types=1);

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

final class HomePageAction implements MiddlewareInterface
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(\PDO $connection)
    {
        // lazy loaded
        $this->connection = $connection;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        try {
            //connect as appropriate as above
            $statement = "SHOW TABLES";
            $this->connection->prepare($statement);
        } catch(\PDOException $e) {
            return new HtmlResponse( $e->getMessage());
        }

        return new HtmlResponse('ok');
    }
}
