<?php

/**
 * Repozitář starající se o články
 *
 * @author Draffix
 */
class PostsRepository extends Repository {

    public function fetchAll() {
        return $this->connection->table('posts')
                        ->order('date DESC');
    }

    public function fetchSingle($id) {
        return $this->connection->table('posts')
                        ->where('id = ?', $id)
                        ->fetch();
    }

}
