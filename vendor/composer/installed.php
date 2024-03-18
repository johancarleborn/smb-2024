<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'dealerdirect/phpcodesniffer-composer-installer' => array(
            'pretty_version' => 'v0.7.2',
            'version' => '0.7.2.0',
            'reference' => '1c968e542d8843d7cd71de3c5c9c3ff3ad71a1db',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../dealerdirect/phpcodesniffer-composer-installer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'giacocorsiglia/wordpress-stubs' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'php-stubs/acf-pro-stubs' => array(
            'pretty_version' => 'v6.0.2',
            'version' => '6.0.2.0',
            'reference' => '3f029889ab95d7ed8baf16149e150bd4bb903227',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-stubs/acf-pro-stubs',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'php-stubs/wordpress-stubs' => array(
            'pretty_version' => 'v6.1.0',
            'version' => '6.1.0.0',
            'reference' => '19e7966c8e70a99a4824b3e5d1526680a151f13b',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-stubs/wordpress-stubs',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.7.1',
            'version' => '3.7.1.0',
            'reference' => '1359e176e9307e906dc3d890bcc9603ff6d90619',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);