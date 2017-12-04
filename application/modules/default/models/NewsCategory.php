<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/13/16
 * Time: 3:56 PM
 */
class Model_NewsCategory extends Application_Singleton
{
    /**
     * @var Model_Dao_NewsCategory
     */
    private $_dao;

    protected function __construct()
    {
        $this->_dao = new Model_Dao_NewsCategory();
    }

    /**
     * Get all config of activation
     * @return array|false|mixed
     */
    public function getAll()
    {
        $key = Application_Cache_Default::getInstance()->newsCategory();
        $result = Application_Cache::getInstance()->load($key);
        if (!$result) {
            $data = $this->_dao->getAll();
            if ($data) {
                foreach ($data as $item) {
                    $result[$item->{DbTable_News_Category::COL_NEWS_CATEGORY_ID}] = $item->toArray();
                }
            }
            Application_Cache::getInstance()->save($result, $key, null);
        }
        return $result;
    }

    /**
     * Get by ID
     * @param int $id
     * @return null|array
     */
    public function getById($id)
    {
        $id = intval($id);
        $dataAll = $this->getAll();
        return isset($dataAll[$id]) & $dataAll[$id] ? $dataAll[$id] : null;
    }

    /**
     * Get name by ID
     * @param int $id
     * @return null
     */
    public function getNameById($id)
    {
        $info = $this->getById($id);
        return $info ? $info[DbTable_News_Category::COL_NEWS_CATEGORY_NAME] : null;
    }

    /**
     * Search by locale ID
     * @param int $localeId
     * @return array
     */
    public function searchByLocaleId($localeId)
    {
        $result = array();
        $data = $this->getAll();
        foreach ($data as $item) {
            if ($item[DbTable_News_Category::COL_FK_LOCALE] == $localeId) {
                array_push($result, $item);
            }
        }
        return $result;
    }

    /**
     * Generate Url
     * @param int $id
     * @param string $title
     * @return string
     */
    public function generateUrl($id, $title)
    {
        $result = '';
        $config = Zend_Registry::get('config');
        $route = $config->resources->router->routes->news_category->route;
        if ($route) {
            $route = Application_Function_Common::formatRouteConfig($route);
            $routeInfo = explode('/', $route);
            $routeInfo[count($routeInfo)-1] = sprintf(
                '%d-%s.html',
                $id,
                Application_Function_String::getFormatUrl($title)
            );
            $result = implode('/', $routeInfo);
        }
        return '/'. $result;
    }

    /**
     * Search by original ID
     * @param int $originalId
     * @return array|false|mixed
     */
    public function searchByOriginalId($originalId)
    {
        $originalId = intval($originalId);
        $key = Application_Cache_Default::getInstance()->newsCategoryOriginal($originalId);
        $result = Application_Cache::getInstance()->load($key);
        if (!$result) {
            $result = Admin_Model_NewsCategory::getInstance()->getByOriginalId($originalId);
            Application_Cache::getInstance()->save($result, $key, null);
        }
        return $result;
    }

    /**
     * Retrieve ID by locale & original ID
     * @param int $localeId
     * @param int $originalId
     * @return array
     */
    public function retrieveInfoByLocale($localeId, $originalId)
    {
        $localeId = intval($localeId);
        $data = $this->searchByOriginalId($originalId);
        $result = null;
        if ($data) {
            foreach ($data as $item) {
                if ($item[DbTable_News_Category::COL_FK_LOCALE] == $localeId) {
                    $result = $item;
                    break;
                }
            }
        }
        return $result;
    }
}