<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Display
 *
 * @author mohamed mokhtar
 */
class Display extends DataBase {

    private $table;
    private $connection;

    public function Display($table, $vars = null) {
        if (isset($vars))
            parent::DataBase($vars);
        else
            parent::DataBase("includes/dataBaseVars.php");

        $this->table = $table;
        $this->connection = $this->connect();
    }

    public function getALLData($orderBy = null) {
        if ($orderBy != null) {
            $orderBy = "order by " . $orderBy;
        }
        $query = "select *from $this->table $orderBy";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("cann't get your data from the database");
        $num = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $data[$i] = $result->fetch_assoc();
            }
            return $data;
        } else
            return FALSE;
    }

    public function getDataById($idKey, $id, $arr = null) {
        $query = "select *from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("cann't get your data from the database");
        $num = $result->num_rows;
        if ($num > 0) {
            if ($arr != null) {
                for ($i = 0; $i < $num; $i++) {
                    $data[] = $result->fetch_assoc();
                }
            } else
                $data = $result->fetch_assoc();


            return $data;
        } else
            return FALSE;
    }

    public function getDataByIdJoin($idKey, $id, $table2, $idKey2, $col, $idKey3) {

        $query1 = "select $idKey2 from $this->table where $idKey = '$id'";
        $query = "select $table2.$col from $table2 inner join ($query1) as tb on $table2.$idKey3 = $idKey2";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("cann't get your data from the database in getDataByJoin");
        $num = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $data[$i] = $result->fetch_assoc();
            }
            return $data;
        } else
            return FALSE;
    }

    public function getDataByIdSimpleJoin($idKey, $id, $table2, $idKey2, $col, $orderBy = null) {
        if ($orderBy != null) {
            $orderBy = "order by $this->table." . $orderBy;
        }
        $query = "select $table2.$col from $table2 inner join $this->table  on $table2.$idKey2 = $this->table.$idKey  where $idKey2 = '$id' $orderBy";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("cann't get your data from the database in getDataByJoin");
        $num = $result->num_rows;
        if ($num > 0) {
            $data = $result->fetch_assoc();

            return $data;
        } else
            return FALSE;
    }

    public function getAllColumnData($column) {
        $query = "select $column from $this->table ";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("can't get your data from the database in getAllColumnData");
        $num = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $data[$i] = $result->fetch_assoc();
            }
            return $data;
        } else
            return FALSE;
    }

    public function getAllColumnsData($columns) {

        if (!is_array($columns)) {
            throw new Exception("the data must be an array");
        }

        foreach ($columns as $key) {
            $str[] = $key;
        }
        $string = implode($str, ",");
        $query = "select $string from $this->table ";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("can't get your data from the database in getAllColumnsData");
        $num = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $data[$i] = $result->fetch_assoc();
            }
            return $data;
        } else
            return FALSE;
    }

    public function getColumnDataById($idKey, $id, $column, $arr = null) {
        $query = "select $column from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("can't get your data from the database in getColumnDataById");
        $num = $result->num_rows;
        if ($num > 0) {

            if ($arr != null) {

                for ($i = 0; $i < $num; $i++) {
                    $data[$i] = $result->fetch_assoc();
                }
            } else
                $data = $result->fetch_assoc();


            return $data;
        } else
            return FALSE;
    }

    public function getColumnsDataBycolumns($columnsArr, $orderBy = null, $columns = null, $criteria = "=") {

        if ($orderBy != null) {
            $orderBy = "order by $this->table." . $orderBy;
        }
        if ($columns == null)
            $string = "*";
        else if ($columns == "*") {
            $string = "*";
        } else {
            foreach ($columns as $value) {
                $keys[] = $value;
            }
            $string = implode($keys, ",");
        }
        foreach ($columnsArr as $key => $value) {
            $all[] = " $key $criteria '$value' ";
        }
        $cols = implode($all, "and");
        $query = "select $string from $this->table where $cols $orderBy";
        $result = $this->connection->query($query);
        if (!$result)
            throw new exception("can't get your data from the database in getColumnsDataBycolumns$query");
        $num = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $data[$i] = $result->fetch_assoc();
            }

            return $data;
        } else
            return FALSE;
    }

    public function dataExists($idKey, $id) {

        $query = "select $idKey from $this->table where $idKey='$id'";
        $result = $this->connection->query($query);
        if (!$result)
            throw new Exception("cannot  pick the id ");
        else {
            if ($result->num_rows > 0)
                return true;
            else
                return false;
        }
    }

    public function getMaxColumn($column) {
        $query = "select max($column) as $column from $this->table";
        $result = $this->connection->query($query);
        if (!$result)
            throw new Exception("cannot  get max of $column");
        else {
            if ($result->num_rows > 0)
                return $result->fetch_assoc();
            else
                return false;
        }
    }

    public function getALLDataAbout($column, $idKey, $as, $columns, $table2, $idKey2, $orderBy = null) {
        if (!is_array($columns)) {
            throw new Exception("the data must be an array");
        }

        foreach ($columns as $key) {
            $str[] = $key;
        }
        $cols = implode($str, ",");
        if ($orderBy != null)
            $orderBy = "order by " . $orderBy;
        $query = "select $this->table.$column ,$cols , count($this->table.$idKey) as $as from $this->table inner join $table2 on $this->table.$column = $table2.$idKey2 group by  $this->table.$column $orderBy";
        $result = $this->connection->query($query);
        if (!$result)
            throw new Exception("cannot  get data");
        else {
            if ($result->num_rows > 0) {

                for ($i = 0; $i < $result->num_rows; $i++) {
                    $data[$i] = $result->fetch_assoc();
                }

                return $data;
            } else
                return false;
        }
    }

    public function getColumnsDataByJoin($column, $columns, $columns2, $table2, $idKey2,$where, $value,$orderBy = null) {
        if (!is_array($columns) || !is_array($columns2)) {
            throw new Exception("the data must be an array");
        }

        foreach ($columns as $key) {
            $str[] = $this->table . "." . $key;
        }
        foreach ($columns2 as $key) {
            $str2[] =  $key;
        }
        $cols = implode($str, ",");
        $cols2 = implode($str2, ",");
        if ($orderBy != null)
            $orderBy = "order by " . $orderBy;
        $query = "select $this->table.$column ,$cols ,$cols2 from $this->table inner join $table2 on $this->table.$column = $table2.$idKey2 where $where = $value $orderBy";
        $result = $this->connection->query($query);
        if (!$result)
            throw new Exception("cannot  get data");
        else {
            if ($result->num_rows > 0) {

                for ($i = 0; $i < $result->num_rows; $i++) {
                    $data[$i] = $result->fetch_assoc();
                }

                return $data;
            } else
                return false;
        }
    }

}
