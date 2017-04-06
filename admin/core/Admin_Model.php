<?php

class Admin_Model extends CI_Model
{
    protected static $dbCache = array();
    protected $tableName;
    protected $whereCondition = array();
    public function __construct()
    {
        parent::__construct();
        $callTable = strtr(strtolower(get_called_class()),array("_model"=>''));
        $dbmap = $this->config->item('dbmap');
        $this->tableName = isset($dbmap[$callTable]) ? $dbmap[$callTable] : '';
        if( $this->tableName && !isset(self::$dbCache[$this->tableName])){
            $this->_init($this->tableName,self::$dbCache);
        }
    }

    public function __set($name, $value)
    {
        if(!property_exists(self::$dbCache[$this->tableName],$name)) return;
        $this->whereCondition[]=$name.'='.(preg_match('/^\d+$/',$value) ? $value : '\''.$value.'\'');
    }

    protected function _getEntity()
    {
        return self::$dbCache[$this->tableName];
    }

    /**
     * 根据INT主键查询
     * @param $idKey
     * @param array $fields
     * @return $this
     */
    public function getByPriIntKey($idKey,array $fields=array())
    {
        if(!isset(self::$dbCache[$this->tableName])){
            return $this;
        }
        //过滤字段
        foreach ($fields as $_idx=>$_search){
            if(self::getMeta($_search) === false) unset($fields[$_idx]);
        }

        //数据查询
        $primarykey = self::$dbCache[$this->tableName.'pri'];
        $sql=sprintf("select %s from %s where %s=%d",$fields ? implode(',',$fields) : '*',$this->tableName,$primarykey,$idKey);
        $detailArr = $this->db->query($sql)->result_array();
        $detailArr=current($detailArr);
        if($detailArr)
            foreach ($detailArr as $_key=>$val){
                self::$dbCache[$this->tableName]->$_key = $val;
            }

        //对象写入
        $detailArr && self::$dbCache[$this->tableName]->$primarykey = $idKey;
        return $detailArr;
    }

    /**
     * 根据INT主键查询
     * @param $idKey
     * @param array $fields
     * @return $this
     */
    public function getByField($field,$val)
    {
        if($field!=1 && !isset(self::$dbCache[$this->tableName])){
            return $this;
        }

        $whereStr = $this->whereCondition ? ' and '.implode(' and ',$this->whereCondition) : '';

        //数据查询
        $primarykey = self::$dbCache[$this->tableName.'pri'];
        $sql=sprintf("select * from %s where %s='%s' %s",$this->tableName,$field,$val,$whereStr);
        $detailArr = $this->db->query($sql)->result_array();
        if(sizeof($detailArr)==1){
            $detailArr=current($detailArr);
            foreach ($detailArr as $_key=>$val){
                self::$dbCache[$this->tableName]->$_key = $val;
            }

            //对象写入
            self::$dbCache[$this->tableName]->$primarykey = $detailArr[$primarykey];
        }

        return $detailArr;
    }

    public function getLastInsertId()
    {
        return $this->db->insert_id();
    }

    public function getMeta($field)
    {
        if(isset(self::$dbCache[$this->tableName]) && property_exists(self::$dbCache[$this->tableName],$field)){
            return self::$dbCache[$this->tableName]->$field;
        }
        return false;
    }

    public function setMeta($field,$val){
        if(!isset(self::$dbCache[$this->tableName]) && !$this->_init($this->tableName,self::$dbCache))
        {
            return false;
        }

        if(!is_scalar($val)){
            return false;
        }

        if(property_exists(self::$dbCache[$this->tableName],$field)){
            self::$dbCache[$this->tableName]->$field = $val;
            return true;
        }

        return false;
    }

    protected function _init($dbTable,&$dbCache){
        $tableObj = new stdClass();
        if(!$this->db->table_exists($dbTable)){
            return $tableObj;
        }

        foreach ($this->db->field_data($dbTable) as $_metaInfo){
            $_metaInfo = (array)$_metaInfo;
            $_metaName = $_metaInfo['name'];

            if(!isset($dbCache[$dbTable.'pri']) && $_metaInfo['primary_key']==1){
                $dbCache[$dbTable.'pri']= $_metaName;
            }
            $tableObj->$_metaName = '';
        }
        $dbCache[$dbTable] = $tableObj;
        $tableObj = null;
    }
}