<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2/22/15
 * Time: 2:03 PM
 */
class Application_Controller_FrontEnd extends Application_Controller
{
    /**
     * @var int
     */
    private $_localeId = 0;

    public function init()
    {
        parent::init();
    }

    public function postDispatch()
    {
        parent::postDispatch();
        $this->autoLoadResource(array(), 'css');
        $this->autoLoadResource(array(), 'js');
        $this->view->assign('moduleName', $this->getRequest()->getControllerName());
        $this->view->assign('actionName', $this->getRequest()->getActionName());
        $this->view->assign('config', $this->getConfig());
        $this->view->assign('currentLocale', $this->getCurrentLocale());
    }

    /**
     * @return bool
     */
    protected function isTestEnv()
    {
        return isset($_GET['xp']) && $_GET['xp']=='mj' ? true : false;
    }

    /**
     * Get current locale ID
     * @return int
     */
    public function getCurrentLocaleId()
    {
        return $this->_localeId;
    }

    /**
     * Prevent search engine from this page
     */
    protected function setNoIndex()
    {
        $this->view->assign('noIndex', 1);
    }

    protected function renderCaptcha($position=-1, $onlyUpperCase=false)
    {
        $config = Zend_Registry::get('config');
        $captchaCode = strtolower($this->_helper->randomString(4));
        $value = $position == -1 ? $captchaCode : $captchaCode[$position] ;
        if ($onlyUpperCase) {
            $value = strtoupper($value);
            $captchaCode = strtoupper($captchaCode);
        }
        $this->saveSessionCaptcha($value);
        Application_Function_Image::renderCaptcha($captchaCode, $config->data->font, $position, 190, 40);
    }

    /**
     * Redirect to 404 page
     */
    protected function goto404()
    {
        $this->gotoUrl('404.html');
    }

    protected function assignMeta($metaTitle, $metaImage, $metaDescription=null)
    {
        if ($metaImage) {
            $this->view->assign('metaImage', $metaImage);
        }
        if ($metaTitle) {
            $this->view->assign('metaTitle', $metaTitle);
        }
        if ($metaTitle) {
            $this->view->assign('metaDescription', $metaDescription);
        }
    }

}