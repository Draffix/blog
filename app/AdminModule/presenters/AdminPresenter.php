<?php
/**
 * User: Jaroslav Klimčík
 * Date: 26.6.13
 * Time: 15:00
 */

namespace AdminModule;

use \Nette\Application\UI\Form;

class AdminPresenter extends BasePresenter {

    /** @var \PostsRepository */
    private $postsRepository;

    public function inject(\PostsRepository $postsRepository) {
        $this->postsRepository = $postsRepository;
    }

    public function handleDeleteArticle($id) {
        $this->postsRepository->deleteArticle($id);
        $this->flashMessage('Článek byl smazán', 'info');
        $this->redirect('Admin:');
    }

    public function beforeRender() {
        parent::beforeRender();
        if (!$this->user->isLoggedIn()) {
            $this->redirect(':Front:Homepage:');
        }
    }

    public function renderDefault() {
        $this->template->posts = $this->postsRepository->fetchAll();
    }

    public function renderSingle($id) {
    }

    /**
     * @return Form
     */
    protected function createComponentEditArticleForm() {
        $post = $this->postsRepository->fetchSingle($this->getParam('id'));

        $form = new Form();
        $form->addText("title", "Název článku: ")
            ->setDefaultValue($post->title)
            ->setRequired('Vyplňte název článku!');
        $form->addTextArea("body", "Text článku: ")
            ->setDefaultValue($post->body)
            ->setRequired('Vyplňte text článku!');
        $form->addHidden("post_id")
            ->setDefaultValue($this->getParam('id'));
        $form->addSubmit("send", "Odeslat");
        $form->onSuccess[] = $this->editArticleFormSucceeded;

        return $form;
    }

    public function editArticleFormSucceeded(Form $form) {
        $values = $form->getValues();
        $post = $values->post_id;
        unset($values->post_id);
        $this->postsRepository->updateArticle($post, $values);
        $this->flashMessage('Článek byl aktualizován', 'info');
        $this->redirect("Admin:");
    }

    /**
     * @return Form
     */
    protected function createComponentAddArticleForm() {
        $form = new Form();

        $form->addText("title", "Název článku: ")
            ->setRequired('Vyplňte název článku!');
        $form->addTextArea("body", "Text článku: ")
            ->setRequired('Vyplňte text článku!');
        $form->addSubmit("send", "Odeslat");
        $form->onSuccess[] = $this->addArticleFormSucceeded;

        return $form;
    }


    /**
     * @param Form $form
     */
    public function addArticleFormSucceeded(Form $form) {
        $values = $form->getValues();
        $values->date = new \Nette\DateTime();
        $this->postsRepository->addArticle($values);
        $this->flashMessage('Článek byl přidán', 'info');
        $this->redirect("Admin:");
    }
}