<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Src\routes\Web;
use Scream\Core\Request;

$app = new Scream\Core\Application();
Web::register($app->router);
$app->run();

//$request = new Request();
//echo "<p>Método HTTP {$request->getMethod()}</p> ";
//echo "<p>Caminho {$request->getPath()}</p> ";
//print "<p>Copro { $request->getBody() }</p>";

