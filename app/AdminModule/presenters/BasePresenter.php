<?php
/**
 * User: Jaroslav Klimčík
 * Date: 26.6.13
 * Time: 14:56
 */

namespace AdminModule;

use \Nette\Diagnostics\Debugger;

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