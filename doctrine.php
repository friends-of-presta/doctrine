<?php

require_once __DIR__ . '/vendor/autoload.php';

use FOP\Doctrine\Menu\TabManager;

class Doctrine extends Module
{
    /**
     * In constructor we define our module's meta data.
     * It's better to keep constructor (and main module class itself) as thin as possible
     * and do any processing in dedicated classes.
     */
    public function __construct()
    {
        $this->name = 'doctrine';
        $this->version = '1.0.0';
        $this->author = 'Mickaël Andrieu';
        $this->need_instance = 0;

        $this->ps_versions_compliancy = [
            'min' => '1.7.6.0',
            'max' => _PS_VERSION_,
        ];

        parent::__construct();

        $this->displayName = 'Doctrine example module';
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        parent::install();
    
        TabManager::addTab('AdminDoctrine', 'Doctrine Menu', 'doctrine', 'AdminTools', 'storage');
        TabManager::addTab('AdminDoctrineFormClass', 'Controller exemple', 'doctrine', 'AdminDoctrine');
        TabManager::addTab('AdminDoctrineGridClass', 'Grid exemple', 'doctrine', 'AdminDoctrine');
        Db::getInstance()->execute(
            'CREATE TABLE ' . _DB_PREFIX_ . 'demo_entity (id INT AUTO_INCREMENT NOT NULL, isbn VARCHAR(13) NOT NULL, expiration_date DATE NOT NULL, alternative_description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB'
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function uninstall()
    {
        parent::uninstall();

        Db::getInstance()->execute('DROP TABLE ' . _DB_PREFIX_ . 'demo_entity');

        return true;
    }
}
