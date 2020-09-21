<?php 

    class DbObject {

        public static function getAll() {
            $sql = "SELECT * FROM " . static::$dbTable . " ORDER BY " . static::$idColumnName;

            return static::getByQuery($sql);
        }

        public static function getSingle($id) {
            $sql = "SELECT * FROM " . static::$dbTable . " WHERE id = $id LIMIT 1";

            $row = static::getByQuery($sql)[0];
            return $row;
        }

        public static function getByQuery($sql) {
            global $db;

            $result = $db->execQuery($sql);

            if(!is_array($result)) {
                return $result;
            }
            $objArr = [];

            foreach($result as $row) {
                $objArr[] = static::initObj($row);
            }

            return $objArr;
        }

        public static function initObj($row) {
            $callingClass = get_called_class();
            $obj = new $callingClass();

            foreach($row as $prop => $val) {
                if(property_exists($callingClass, $prop)) {
                    $obj->$prop = $val;
                }
            }

            return $obj;
        }

        protected function getProps() {
            $props = [];

            foreach (static::$tableFields as $field) {
                if(property_exists($this, $field)) {
                    $props[$field] = $this->$field;
                }
            }

            return $props;
        }

        public function save() {
            return isset($this->id) ? $this->update() : $this->insert();
        }

        public function insert() {
            global $db;

            $props = $this->getProps();

            $sql = "INSERT INTO " . static::$dbTable . " (" . implode(",", array_keys($props)) . ")";
            $sql .= " VALUES ('" . implode("','", array_values($props)) . "')";

            $res = $db->execQuery($sql);

            if(is_array($res)) {
                $this->id = $db->lastInsertId();

                return true;
            } else {
                return $res;
            }


        }

        public function update() {
            global $db;

            $props = $this->getProps();
            $propPairs = [];

            foreach($props as $key => $val) {
                $propPairs[] = "{$key}='{$val}'";
            }

            $sql = "UPDATE " . static::$dbTable . " SET ";
            $sql .= implode(",", $propPairs);
            $sql .= " WHERE id= " . $this->id;

            return $db->execQuery($sql);
            
        }

        public function delete() {
            global $db;

            $sql = "DELETE FROM " . static::$dbTable . " WHERE id = {$this->id}";

            return $db->execQuery($sql);
        }

        public static function countAll() {
            global $db;

            $sql = "SELECT COUNT(*) as total FROM " . static::$dbTable;
            $resultArr = $db->execQuery($sql);
            return $resultArr[0]['total'];
        }

    }

?>