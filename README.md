# Biblioteca de CRUD com PDO.

Para fazer a instalação da biblioteca, execute o seguinte comando:

```sh
composer require thiagosv/controller-pdo-query
```

Para fazer o uso da biblioteca, basta configurar os dados do banco no arquivo _app/Conn.php requerir o autoload do composer, invocar a classe e fazer a chamada do método:

```sh
	private static $Host = 'IP';
    private static $User = 'USER';
    private static $Pass = 'PASSWORD';
    private static $Dbsa = 'DBSA';
```

Uso das classes:

SELECT:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE pdoQuery\_app\Read;

$Read->ExeRead("table", "WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");
$Read->FullRead("SELECT * FROM table WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");

$Read->getResult(); **  **
```
UPDATE:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE pdoQuery\_app\Update;

$Update->ExeUpdate("tabela", ['value1' => 'value2'], "WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");

$Update->getResult(); **  **
```
DELETE:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE pdoQuery\_app\Delete;

$Delete->ExeDelete("table", "Query sem select", "param=value&param2=value2");

$Delete->getResult(); **  **
```
Insert:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE pdoQuery\_app\Create;

$Insert->ExeCreate("table", ['column1' => 'value1', 'column2' => 'value2']);

$Insert->getResult(); **  **
```


### Developers
* [Thiago Vieira]

License
----

MIT

[//]:#
[Thiago Vieira]: <mailto:thiagosilvavieira97@gmail.com>