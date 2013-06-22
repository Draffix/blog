<?php

/**
 * Repozitář starající se o komentáře
 *
 * @author Draffix
 */
class CommentsRepository extends Repository {

    public function fetchAll($post_id) {
        return $this->connection->table('comments')
                        ->where('post_id = ?', $post_id);
    }

    public function insert($data) {
        $this->connection->table('comments')
                ->insert($data);
    }
    
}
