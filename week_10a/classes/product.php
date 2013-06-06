<?php
require_once("table.php");
require_once("distributor.php");

class Product extends Table
{
    protected $tableName = "products";
    /**
 	 * Get the distributors belonging to a product
 	 * @author	Brent Allen
 	 * @return 	Array	An array of Distributor objects
  	*/
    public function getDistributors()
    {
        $idlist = $this->getArray("SELECT `distributor_id` FROM `distributors_has_products` WHERE `product_id` = $this->id");
        $ret = array();
        foreach($idlist as $idItem)
        {
            $ret[] = new Distributor($idItem->distributor_id);
        }
        
        return $ret;
    }
    
    /**
 	 * Get a list of distributor names
 	 * @author	Brent Allen
 	 * @return 	String	A comma separated list of distributor names
  	*/
    public function implodeDistributors()
    {
        $ret = array();
        foreach($this->getDistributors() as $distributor)
        {
            $ret[] = $distributor->name;
        }
        return implode(", ",$ret);
    }
    
    /**
 	 * Add a distributor to this product
 	 * @author	Brent Allen
 	 * @param	int     id  The id of the distributor
 	 * @return 	void
  	*/
    public function addDistributor($id)
    {
        if($id instanceof Distributor)
        {
            $id = $id->id;
        }
        $this->query("INSERT INTO `distributors_has_products` (`product_id`, `distributor_id`) VALUES ($this->id, $id) ");
    }
    
    /**
 	 * Apply an array of distributor IDs to this product
 	 * @author	Brent Allen
 	 * @param	Array	ids 	the ids to add
 	 * @return 	void
  	*/
    public function addDistributors($ids)
    {
        foreach($ids as $id)
        {
            $this->addDistributor($id);
        }
    }
    
    
    
}