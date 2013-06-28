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

    public function updateArticle($id, $data) {
        $this->connection->table('posts')
            ->where('id = ?', $id)
            ->update($data);
    }

    public function deleteArticle($id) {
        $this->connection->table('posts')
            ->where('id = ?', $id)
            ->delete();
    }

    public function addArticle($data) {
        $this->connection->table('posts')
            ->insert($data);
    }

}
