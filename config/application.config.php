<?php
 
$env = getenv('APP_ENV') ? : 'development'; // ou 'production'
 
$modules = array(
    'Contato',
);
if ($env == 'development') {
 // se estiver em desenvolvimento adiciona os módulos da aplicação direto, se não adiciona eles no cache
 //   $modules[] = 'ZendDeveloperTools';
  //  $modules[] = 'BjyProfiler';
}
 
return array(
    'modules' => $modules,
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_cache_enabled' => false,
        'config_cache_key' => 'app_config',
        'module_map_cache_enabled' => ($env == 'development'),
        'module_map_cache_key' => 'module_map',
        'cache_dir' => './data/cache',
        'check_dependencies' => ($env != 'development'),
    ),
);