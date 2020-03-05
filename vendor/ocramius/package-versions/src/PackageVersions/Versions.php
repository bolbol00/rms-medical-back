<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'api-platform/api-pack' => 'v1.2.1@41364f8763475d7709c43f790aa77a4157d038e2',
  'api-platform/core' => 'v2.5.4@14ed547d10a23dcd5c852e24948e661aee48492e',
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => '1.10.0@382e7f4db9a12dc6c19431743a2b096041bcdd62',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => '2.12.0@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => 'v2.10.1@c2b8e6e82732a64ecde1cddf9e1e06cb8556e3d8',
  'doctrine/doctrine-bundle' => '2.0.7@6926771140ee87a823c3b2c72602de9dda4490d3',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.1@a3987131febeb0e9acb3c47ab0df0af004588934',
  'doctrine/orm' => 'v2.7.1@445796af0e873d9bd04f2502d322a7d5009b6846',
  'doctrine/persistence' => '1.3.6@5dd3ac5eebef2d0b074daa4440bb18f93132dee4',
  'doctrine/reflection' => 'v1.1.0@bc420ead87fdfe08c03ecc3549db603a45b06d4c',
  'fig/link-util' => '1.1.0@47f55860678a9e202206047bc02767556d298106',
  'friendsofsymfony/rest-bundle' => '2.7.1@affb4fe1eb079b9b659656bd548b7089c0a04fb2',
  'hoa/compiler' => '3.17.08.08@aa09caf0bf28adae6654ca6ee415ee2f522672de',
  'hoa/consistency' => '1.17.05.02@fd7d0adc82410507f332516faf655b6ed22e4c2f',
  'hoa/event' => '1.17.01.13@6c0060dced212ffa3af0e34bb46624f990b29c54',
  'hoa/exception' => '1.17.01.16@091727d46420a3d7468ef0595651488bfc3a458f',
  'hoa/file' => '1.17.07.11@35cb979b779bc54918d2f9a4e02ed6c7a1fa67ca',
  'hoa/iterator' => '2.17.01.10@d1120ba09cb4ccd049c86d10058ab94af245f0cc',
  'hoa/math' => '1.17.05.16@7150785d30f5d565704912116a462e9f5bc83a0c',
  'hoa/protocol' => '1.17.01.14@5c2cf972151c45f373230da170ea015deecf19e2',
  'hoa/regex' => '1.17.01.13@7e263a61b6fb45c1d03d8e5ef77668518abd5bec',
  'hoa/stream' => '1.17.02.21@3293cfffca2de10525df51436adf88a559151d82',
  'hoa/ustring' => '4.17.01.16@e6326e2739178799b1fe3fdd92029f9517fa17a0',
  'hoa/visitor' => '2.17.01.16@c18fe1cbac98ae449e0d56e87469103ba08f224a',
  'hoa/zformat' => '1.17.01.10@522c381a2a075d4b9dbb42eb4592dd09520e4ac2',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'jms/metadata' => '2.1.0@8d8958103485c2cbdd9a9684c3869312ebdaf73a',
  'jms/serializer' => '3.5.0@0e286681396d8139406e596c6c802d37ab0b2124',
  'jms/serializer-bundle' => '3.5.0@5793ec59b2243365a625c0fd78415732097c11e8',
  'nelmio/cors-bundle' => '2.0.1@9683e6d30d000ef998919261329d825de7c53499',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.4@da3fd972d6bafd628114f7e7e036f45944b62e9c',
  'phpdocumentor/type-resolver' => '1.1.0@7462d5f123dfc080dfdf26897032a6513644fc95',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'sensio/framework-extra-bundle' => 'v5.5.3@98f0807137b13d0acfdf3c255a731516e97015de',
  'symfony/asset' => 'v4.3.11@5bdbd8878b69e3be16d036890ea3081172ea28c5',
  'symfony/cache' => 'v4.3.11@8794ccf68ac341fc19311919d2287f7557bfccba',
  'symfony/cache-contracts' => 'v1.1.7@af50d14ada9e4e82cfabfabdc502d144f89be0a1',
  'symfony/config' => 'v4.3.11@7b7d5d35a5ba5a62f2c6c69f574e36595e587d11',
  'symfony/console' => 'v4.3.11@82aeab8f852a63e83d781617841237944392cd45',
  'symfony/debug' => 'v4.3.11@8e362996356f2555d493ee3d8285424853955e8f',
  'symfony/dependency-injection' => 'v4.3.11@468bfb60a60b7caa03e4722c43f5359df47b4349',
  'symfony/doctrine-bridge' => 'v4.3.11@64cbcf5635fb1b38131332d0b3784faeec9a9e9a',
  'symfony/dotenv' => 'v4.3.11@3e41dc2a3c517819b23cb4d1c95f5116182a8dd0',
  'symfony/event-dispatcher' => 'v4.3.11@75f99d7489409207d09c6cd75a6c773ccbb516d5',
  'symfony/event-dispatcher-contracts' => 'v1.1.7@c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
  'symfony/expression-language' => 'v4.3.11@fcc3e2085e4832f52bed94d72663962f650dfb23',
  'symfony/filesystem' => 'v4.3.11@fdc0ac5e64f7555818411a17993bb24be4270769',
  'symfony/finder' => 'v4.3.11@8174c13b932c71f10cdd8dfcd8f5e494f1e7003d',
  'symfony/flex' => 'v1.6.2@e4f5a2653ca503782a31486198bd1dd1c9a47f83',
  'symfony/framework-bundle' => 'v4.3.11@4ea8f63e005af800e140c1bcfb1f748a006defd1',
  'symfony/http-foundation' => 'v4.3.11@90af881cedc857dca17990cae96f37727b8ae1d6',
  'symfony/http-kernel' => 'v4.3.11@fcd8fe5b98d435da856b310a01a4f281668607c0',
  'symfony/inflector' => 'v4.3.11@8c699257379098d26fa400edad29f703b380efcf',
  'symfony/maker-bundle' => 'v1.14.4@b06ebe524357945a4e7ffee42ade880bdf9e1500',
  'symfony/mime' => 'v4.3.11@50f65ca2a6c33702728024d33e4b9461f67623c4',
  'symfony/orm-pack' => 'v1.0.8@c9bcc08102061f406dc908192c0f33524a675666',
  'symfony/polyfill-intl-idn' => 'v1.14.0@6842f1a39cf7d580655688069a03dd7cd83d244a',
  'symfony/polyfill-mbstring' => 'v1.14.0@34094cfa9abe1f0f14f48f490772db7a775559f2',
  'symfony/polyfill-php72' => 'v1.14.0@46ecacf4751dd0dc81e4f6bf01dbf9da1dc1dadf',
  'symfony/polyfill-php73' => 'v1.14.0@5e66a0fa1070bf46bec4bea7962d285108edd675',
  'symfony/property-access' => 'v4.3.11@28ecead27bd17937b3f904396b026a8e3915d0cd',
  'symfony/property-info' => 'v4.3.11@169aafe8f2a01ec50fb324f5d24bbd61a5799df1',
  'symfony/routing' => 'v4.3.11@6cc4b6a92e3c623b2c7e56180728839b0caf8564',
  'symfony/security-bundle' => 'v4.3.11@1cc02bd8e44eef0bd4ecfd53a8b4d7b26f675d85',
  'symfony/security-core' => 'v4.3.11@8d008438e4bbdf04086d1048d51cc1b5dfac2046',
  'symfony/security-csrf' => 'v4.3.11@9e435026ab45f073880d1fbe0e1b17e7df6bf642',
  'symfony/security-guard' => 'v4.3.11@5d87ee4ffa5aa6e594008fa3cc65bc8f86ad6438',
  'symfony/security-http' => 'v4.3.11@2b4b8632956c680400006376fad0a4f9889d4be1',
  'symfony/serializer' => 'v4.3.11@cd4f545209e1f3d408b5adda729c59bfd714a1a5',
  'symfony/service-contracts' => 'v1.1.8@ffc7f5692092df31515df2a5ecf3b7302b3ddacf',
  'symfony/stopwatch' => 'v4.3.11@4aff3715c98706ee25bdb4aced6591a9dffc3d9b',
  'symfony/translation-contracts' => 'v1.1.7@364518c132c95642e530d9b2d217acbc2ccac3e6',
  'symfony/twig-bridge' => 'v4.3.11@9574613b74ed066f775eaf94bb15476ef58609de',
  'symfony/twig-bundle' => 'v4.3.11@0471344717bfb081f10209ad6b8fd520ca8ebd9d',
  'symfony/validator' => 'v4.3.11@0d2dcf4ae26db5b6781f40fcab9785f427ee7fa4',
  'symfony/var-exporter' => 'v4.3.11@563f728784ea09c8154ea57cf8192ae5d6f0d277',
  'symfony/web-link' => 'v4.3.11@5f47af858f264ce1d29388fb2a05f54e3c687794',
  'symfony/yaml' => 'v4.3.11@8e0a95493b734ca8195acf3e1f3d89e88b957db5',
  'twig/twig' => 'v2.12.5@18772e0190734944277ee97a02a9a6c6555fcd94',
  'webmozart/assert' => '1.7.0@aed98a490f9a8f78468232db345ab9cf606cf598',
  'willdurand/jsonp-callback-validator' => 'v1.1.0@1a7d388bb521959e612ef50c5c7b1691b097e909',
  'willdurand/negotiation' => 'v2.3.1@03436ededa67c6e83b9b12defac15384cb399dc9',
  'zendframework/zend-code' => '3.4.1@268040548f92c2bfcba164421c1add2ba43abaaa',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'paragonie/random_compat' => '2.*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  'symfony/polyfill-ctype' => '*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  'symfony/polyfill-iconv' => '*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  'symfony/polyfill-php71' => '*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  'symfony/polyfill-php70' => '*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  'symfony/polyfill-php56' => '*@94e2cc50a5759e1ce997840f892864cb8b0367b7',
  '__root__' => 'dev-master@94e2cc50a5759e1ce997840f892864cb8b0367b7',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}