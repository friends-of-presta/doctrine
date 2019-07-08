<?php

namespace FOP\Doctrine\Menu;

use Tab;
use Language;

/**
 * Allows to insert a menu in PrestaShop Back Office
 */
final class TabManager
{
    /**
     * @param $className
     * @param $tabName
     * @param $moduleName
     * @param $parentClassName
     * @param $icon
     *
     * @return Tab
     *
     * @throws \PrestaShopDatabaseException
     * @throws \PrestaShopException
     */
    public static function addTab($className, $tabName, $moduleName, $parentClassName, $icon = null)
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $className;
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $tabName;
        }
        
        if (!is_null($icon)) {
            $tab->icon = $icon;
        }

        $tab->id_parent = (int) Tab::getIdFromClassName($parentClassName);
        $tab->module = $moduleName;
        $tab->add();
        
        return $tab;
    }
}
