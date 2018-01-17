# Biblioteca de CRUD com PDO.

Para fazer a instalação da biblioteca, execute o seguinte comando:

```sh
composer require thiagosv/controller-pdo-query
```

Para fazer o uso da biblioteca, basta configurar os dados do banco, existentes no arquivo src/Conn.php e requerir o autoload do composer, invocar a classe e fazer a chamada do método:

```sh
    private static $host = DATABASE['HOST'];
    private static $user = DATABASE['USER'];
    private static $pass = DATABASE['PASS'];
    private static $name = DATABASE['NAME'];
```

Uso das classes:

SELECT:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE ThiagoSV\ControllerPDO\Read;

$Read->read("table", "WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");
$Read->readFull("SELECT * FROM table WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");

$Read->getResult(); **  **
```
UPDATE:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE ThiagoSV\ControllerPDO\Update;

$Update->update("tabela", ['value1' => 'value2'], "WHERE column1 = :param AND column2 = :param2", "param=value&param2=value2");

$Update->getResult(); **  **
```
DELETE:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE ThiagoSV\ControllerPDO\Delete;

$Delete->delete("table", "Query sem select", "param=value&param2=value2");

$Delete->getResult(); **  **
```
Insert:
```sh
<?php

require __DIR__ . '/vendor/autoload.php';

USE ThiagoSV\ControllerPDO\Create;

$Insert->create("table", ['column1' => 'value1', 'column2' => 'value2']);

$Insert->getResult(); **  **
```


### Developers
* [Thiago Vieira]

License
----

MIT

[//]:#
[Thiago Vieira]: <mailto:thiagosilvavieira97@gmail.com>