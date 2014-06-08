<?php
/**
 * Author: Jaroslav Klimčík
 * Date: 8.6.14
 * Website: http://jerryklimcik.cz
 */

abstract class Repository extends Nette\Object {

    /** @var Nette\Database\Context */
    protected $connection;

    public function __construct(Nette\Database\Context $db) {
        $this->connection = $db;
    }


}