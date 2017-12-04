<?php
class IndexController extends Application_Controller_FrontEnd
{
    public function indexAction()
    {

    }

    public function changeLocaleAction()
    {
        $locale = $this->getRequest()->getParam('locale');
        $this->setCurrentLocale($locale);
        $this->gotoUrl('/');
        $this->noRender();
    }

    public function captchaAction()
    {
        $this->renderCaptcha();
        $this->noRender();
    }

    public function pageNotFoundAction()
    {

    }
}