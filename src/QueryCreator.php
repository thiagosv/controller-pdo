<?php
/**
 * Responsável pelas ações do banco
*/
namespace ThiagoSV\ControllerPDO;

class QueryCreator{

    protected $select;
    protected $from;
    protected $where;
    protected $order;
    protected $having;
    protected $places;
    protected $limit;
    protected $offset;

    /**
     * @param $select
     */
    public function select($select){
        $select = explode(",", $select);
        if(is_array($select)){
            foreach($select as $cols){
                $this->addSelect($cols);
            }
        }
    }

    /**
     * @param $select
     */
    private function addSelect($select){
        if(!empty($this->select)){
            $this->select .= ", {$select}";
        }else{
            $this->select = "SELECT " . $select;
        }
    }

    /**
     * @param $tabela
     */
    public function from($tabela){
        if(!empty($tabela)) {
            $this->addFrom($tabela);
        }
    }

    private function addFrom($from){
        if(!empty($this->from)){
            $this->from .= "{$from}";
        }else{
            $this->from = " FROM " . $from;
        }
    }

    /**
     * @param $tabela1
     * @param $tabela2
     * @param $join
     */
    public function fromInnerJoin($tabela1, $tabela2 = NULL, $join){
        if(!empty($this->from)){
            if($tabela2):
                $this->from .= " " . $tabela1 . " INNER JOIN " . $tabela2 . " ON " . $join;
            else:
                $this->from .= " INNER JOIN " . $tabela1 . " ON " . $join;
            endif;
        }else{
            $this->from = " FROM " . $tabela1 . " INNER JOIN " . $tabela2 . " ON " . $join;
        }
    }

    /**
     * @param $where
     */
    public function where($where){
        if (!empty($where)) {
            $where = explode(",", $where);
            if (is_array($where)) {
                foreach ($where as $cols) {
                    $this->addWhere($cols);
                }
            }
        }
    }

    /**
     * @param $where
     */
    private function addWhere($where){
        if(!empty($this->where)){
            $this->where .= " AND " . $where;
        }else{
            $this->where = " WHERE " . $where;
        }
    }

    /**
     * INFORMAR UM ARRAY ATRIBUITIVO, EXEMPLO: ['coluna' => 'ASC']
     * @param $order
     */
    public function order($order){
        if (!empty($order)) {
            if (is_array($order)) {
                foreach ($order as $cols => $tipo) {
                    $this->addOrder($cols, $tipo);
                }
            }
        }
    }

    /**
     * @param $order
     * @param $tipo
     */
    private function addOrder($order, $tipo){
        if(!empty($this->order)){
            $this->order .= ", " . $order . " " . $tipo;;
        }else{
            $this->order = " ORDER BY " . $order . " " . $tipo;
        }
    }

    /**
     * @param $place
     */
    public function places($place){
        if (!empty($place)) {
            $place = explode(",", $place);
            if (is_array($place)) {
                foreach ($place as $cols) {
                    $this->addPlaces($cols);
                }
            }
        }
    }

    /**
     * @param $place
     */
    private function addPlaces($place){
        if(!empty($this->places)){
            $this->places .= "&" . $place;
        }else{
            $this->places = $place;
        }
    }

    public function limit($limit){
        if(!empty($limit) && is_int($limit)){
            $this->limit = " LIMIT :limit";
            $this->places("limit={$limit}");
        }
    }

    public function offset($offset){
        if(!empty($offset) && is_int($offset)){
            $this->offset = " OFFSET :offset";
            $this->places("offset={$offset}");
        }
    }

    /**
     * @return mixed
     */
    public function getSelect(){
        return $this->select;
    }

    /**
     * @return mixed
     */
    public function getFrom(){
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getWhere(){
        return $this->where;
    }

    /**
     * @return mixed
     */
    public function getHaving(){
        return $this->having;
    }

    /**
     * @return mixed
     */
    public function getOrder(){
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getPlaces(){
        return $this->places;
    }

    /**
     * @return mixed
     */
    public function getLimit(){
        return $this->limit;
    }

    /**
     * @return mixed
     */
    public function getOffset(){
        return $this->offset;
    }


    /**
     * @return mixed
     */
    public function getQuery(){
        return $this->getSelect() . $this->getFrom() . $this->getWhere() . $this->getOrder() . $this->getLimit() . $this->getOffset();
    }


}