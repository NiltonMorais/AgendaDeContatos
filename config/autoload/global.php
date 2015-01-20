<?php


 // CONEXÃO COM O BANCO DE DADOS


return array(
    'db' => array(
        'driver'            => 'Pdo',
        'dsn'               => 'mysql:dbname=agenda_contatos;host=localhost', // BANCO DE DADOS
        'driver_options'    => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'
        ),
    ),
    
    // OBS: O username e password do banco está em local.php na class db
    
    
    // REGISTRANDO O SERVICE MANAGER PARA PODER USAR A CONEXÃO COM O BD EM QUALQUER LUGAR, USANDO O SERVICO "AdapterDb"
     'service_manager' => array(
        'factories' => array(
            'AdapterDb'   => 'Zend\Db\Adapter\AdapterServiceFactory', // new Zend\Db\Adapter\AdapterServiceFactory
        ),
            'abstract_factories' => array(  // classe abstrata para suprir a dependência do Cache.
                  'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        ),
    ),
);

