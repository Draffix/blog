<?php
/**
 * Author: Jaroslav Klimčík
 * Date: 8.6.14
 * Website: http://jerryklimcik.cz
 */

class CommentsRepository extends Repository {

    public function fetchArticleComments($post_id) {
        return $this->connection->table('comments')
            ->where('post_id = ?', $post_id);
    }

    public function insert($data) {
        $this->connection->table('comments')
            ->insert($data);
    }

    public function deleteComments($id) {
        $this->connection->table('comments')
            ->where('post_id = ?', $id)
            ->delete();
    }

}