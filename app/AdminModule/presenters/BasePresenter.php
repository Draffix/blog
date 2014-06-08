<?php
/**
 * Author: Jaroslav Klimčík
 * Date: 8.6.14
 * Website: http://jerryklimcik.cz
 */

namespace AdminModule;


class BasePresenter extends \Nette\Application\UI\Presenter {

    public function beforeRender() {
        $this->setLayout('layoutAdmin');
    }

    public function handleLogOut() {
        $this->user->logout();
        $this->flashMessage('Byl jste odhlášen', 'info');
        $this->redirect(':Front:Homepage:default');

    }

}