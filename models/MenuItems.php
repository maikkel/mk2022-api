<?php
class MenuItems {
    private $conn;
    private $table = 'menu_items';
    private $fields = '
        `id`,
        `key`,
        `name`,
        `description`,
        `type`,
        `url`
    ';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $query = '
            SELECT 
                '.$this->fields.'
            FROM 
                '.$this->table.'
            ORDER BY
                `order` ASC 
        ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}