<?php

namespace FrontModule;

use Nette\Application\UI;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /** @var \PostsRepository */
    private $postsRepository;

    /** @var \CommentsRepository */
    private $commentsRepository;

    public function inject(\PostsRepository $postsRepository, \CommentsRepository $commentsRepository) {
        $this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;
    }

    public function renderDefault() {
        $this->template->posts = $this->postsRepository->fetchAll();
    }

    public function renderSingle($id) {
        if (!($post = $this->postsRepository->fetchSingle($id))) {
            $this->error('Článek nebyl nalezen'); //pokud clanek neexistuje, presmerujeme uzivatele
        }
        $this->template->post = $post;
        $this->template->comments = $this->commentsRepository->fetchArticleComments($id);
    }

    protected function createComponentCommentForm() {
        $form = new UI\Form();
        $form->addText('author', 'Jméno: ')
                ->addRule($form::FILLED, 'To se neumíš ani podepsat?!');
        $form->addTextArea('body', 'Komentář: ')
                ->addRule($form::FILLED, 'Komentář je povinný!');
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = callback($this, 'commentFormSubmitted');
        return $form;
    }

    public function commentFormSubmitted(UI\Form $form) {
        $data = $form->getValues();
        $data['date'] = new \DateTime();
        $data['post_id'] = (int) $this->getParam('id');
        $id = $this->commentsRepository->insert($data);
        $this->flashMessage('Komentář uložen!');
        $this->redirect("this");
    }
}
