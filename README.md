# Migration Mysql

[![Source Code](http://img.shields.io/badge/source-lcs13761/migration-blue.svg?style=flat-square)](https://github.com/lcs13761/migration)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/lcs13761/migration.svg?style=flat-square)](https://packagist.org/packages/lcs13761/migration)
[![Latest Version](https://img.shields.io/github/release/lcs13761/migration.svg?style=flat-square)](https://github.com/lcs13761/migration/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/lcs13761/migration.svg?style=flat-square)](https://scrutinizer-ci.com/g/lcs13761/migration)
[![Quality Score](https://img.shields.io/scrutinizer/g/lcs13761/migration.svg?style=flat-square)](https://scrutinizer-ci.com/g/lcs13761/migration)
[![Total Downloads](https://img.shields.io/packagist/dt/lcs13761/migration.svg?style=flat-square)](https://packagist.org/packages/lcs13761/migration)

### Highlights

- Simple installation (Instalação simples)

## Installation

Uploader is available via Composer:

```bash
"lcs13761/migration": "^2.0" 
```

or run

```bash
composer require lcs13761/migration
```

## Documentation

###### Antes de inicar é necessario configurar os dados de conexao do banco de dados.

Before starting it is necessary to configure the database connection data.

The file that needs to be configured is in( O arquivo que precisa ser configurado fica em)
```bash
vendor/lcs13761/migration/src/Config/Database/Config.php 
```
configuraçao padrao do projeto
```bash
define("DB_HOST","127.0.0.1");
define("DB_USER","root");
define("DB_NAME","project");
define("DB_PASSWD","root");
```

to add the migration file (Para adicionar o arquivo de migração)
```bash
php ./vendor/lcs13761/migration/migration.php -c fileName
```
#### User endpoint:

```php
<?php


use Luke\Schemas\Schema;
use Luke\Types\Blueprint;

class Test
{
  public function up()
  {
    Schema::create("teste", function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
    });
  }
}
```

Apos a estrutura o arquivo, execute

```bash
./vendor/lcs13761/migration/migration.php -m 
```
### Others

Os comandos disponiveis são
```bash
 [-c] [--create] cria o arquivo, para a implementa os dados para a migração. 
 [-m] [--migration] realizar a migraçao dos arquivos para o banco de dados. 
```


### Type Data

```bash
    string
    int
    bigint
    datetime
    timetamps
    float
    text
```

## Contributing

Please see [CONTRIBUTING](https://github.com/lcs13761/migration/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email lks137610@gmail.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para lks137610@gmail.com em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Lucas S. Santos](https://github.com/lcs13761) (Developer)
- [All Contributors](https://github.com/lcs13761/migration/contributors) (This Rock)
₢## License

The MIT License (MIT). Please see [License File](https://github.com/lcs13761/migration/blob/master/LICENSE) for more information.