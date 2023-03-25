<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master_db extends CI_Model{
    function getRecords($table,$db = array(),$select = "*",$ordercol = '',$group = '',$start='',$limit='')
    {
        $this->db->select($select);
        if(!empty($ordercol))
        {
            $this->db->order_by($ordercol);
        }
        if($limit != '' && $start !='')
        {
            $this->db->limit($limit,$start);
        }
        if($group != '')
        {
            $this->db->group_by($group);
        }
        $q=$this->db->get_where($table, $db);
        return $q !== FALSE ? $q->result() : array();
        //return $q->result();
        //return $this->db->last_query();
    }
	
	function insertRecord($table,$db=array())
    {
        $q=$this->db->insert($table, $db); 
        return $q !== FALSE ? $this->db->insert_id() : null;
        /* $total = $this->db->insert_id();
        if($total>0)
        return $total;
        else 
        return 0; */
    }

	function insertBatch($table,$db=array())
    {
        $q=$this->db->insert_batch($table, $db); 
        return $q !== FALSE ? $this->db->insert_id() : null;
    }
    
	function getnumberformat($num){
    	return str_replace(".00", "", (string)number_format((float)$num, 0, '.', ','));
    }
    
	function deleterecord($table,$db=array())
	{
		$this->db->delete($table, $db);
	}
	
	function updateRecord($table,$data,$where=array())
	{
	    $q = $this->db->update($table,$data,$where);
	    return $q !== FALSE ? $this->db->affected_rows() : array();
	   /*  $total = $this->db->affected_rows();
	    if($total>0)
	        return 1;
	        else
	            return 0; */
	}
	
	/* dont use this unnecessarily Ask to Aruna before using */
	function sqlExecute($sql)
	{
	    $q=$this->db->query($sql);
	    return $q !== FALSE ? $q->result() : array();
	}
	
    /* Remove after updating */ 
     function countRec($fname,$tname,$where)
    {
        $sql = "SELECT * FROM $tname $where";
        $q=$this->db->query($sql);
        return $q->num_rows();
    }
    
     function runQuery($sql)
    {
    	$this->db->query($sql);
    }

    public function getRecordsByJoin($table,$where,$columns="*",$join_arr=array(),$order_by=array(),$group = '',$limit=0,$skip=0)
	{
		$this->db->select($columns);
		$this->db->from($table);
		
		if($join_arr)
		{
			foreach($join_arr as $ar)
			{
				$this->db->join($ar['table'], $ar['on'],$ar['type']);
			}		
		}
		$this->db->where($where);

		if( $group != '' ){
			$this->db->group_by($group);
		}

		if($order_by)
		{
			$this->db->order_by($order_by[0],$order_by[1]);
		}

		if($skip){ $this->db->skip($skip); }

		if($limit)
		{
			$this->db->limit($limit);
		}

		$q=$this->db->get();
	    return $q !== FALSE ? $q->result() : array();

		// $query  = $this->db->get();
		// //echo $this->db->last_query();exit;
		// return $query->result();
	}
	
	public function getCategoryList($params,$type=1){

		//echo '<pre>';print_r($params);exit;
		$order_column = array('id','catName','order_no','status','id');
		$select = '*';
		$where = array(
			'status !=' =>	3
		);
		
		$this->db->select($select)->from('category c')->where($where);

		if(isset($params["search"]["value"]) && !empty($params["search"]["value"]) )
		{ 
			$val = trim($params["search"]["value"]);
			$this->db->where("catName like '%".$val."%' ");
			$this->db->or_where("order_no like '%".$val."%' ");
		}
		
		if( $type == 1 ){
			$this->db->limit($params['length'], $params['start']);

			if( isset($params["order"][0]["column"]) && !empty($params["order"][0]["column"]) ){
				$this->db->order_by($order_column[$params["order"][0]["column"]],$params["order"][0]["dir"]);
			}
			
		}

		$q=$this->db->get();
        return $q !== FALSE ? $q->result() : array();

	}

	public function getSubCategoryList($params,$type=1){

		//echo '<pre>';print_r($params);exit;
		$order_column = array('s.id','s.subcatName','s.order_no','c.catName','s.status','s.id');
		$select = 's.*,c.catName';
		$where = array(
			's.status !=' =>	3
		);
		
		$this->db->select($select)->from('sub_category s')
			->join('category c','c.id=s.cat_id')->where($where);

		if(isset($params["search"]["value"]) && !empty($params["search"]["value"]) )
		{ 
			$val = trim($params["search"]["value"]);
			$this->db->where("c.catName like '%".$val."%' ");
			$this->db->or_where("s.subcatName like '%".$val."%' ");
			$this->db->or_where("s.order_no like '%".$val."%' ");
		}
		
		if( $type == 1 ){
			$this->db->limit($params['length'], $params['start']);

			if( isset($params["order"][0]["column"]) && !empty($params["order"][0]["column"]) ){
				$this->db->order_by($order_column[$params["order"][0]["column"]],$params["order"][0]["dir"]);
			}
			
		}

		$q=$this->db->get();
        return $q !== FALSE ? $q->result() : array();

	}
    
	public function getBrandList($params,$type=1){

		//echo '<pre>';print_r($params);exit;
		$order_column = array('b.id','b.brandName','b.order_no','b.status','b.id');
		$select = '*';
		$where = array(
			'b.status !=' =>	3
		);
		
		$this->db->select($select)->from('brand b')->where($where);

		if(isset($params["search"]["value"]) && !empty($params["search"]["value"]) )
		{ 
			$val = trim($params["search"]["value"]);
			$this->db->where("b.brandName like '%".$val."%' ");
			$this->db->or_where("b.order_no like '%".$val."%' ");
		}
		
		if( $type == 1 ){
			$this->db->limit($params['length'], $params['start']);

			if( isset($params["order"][0]["column"]) && !empty($params["order"][0]["column"]) ){
				$this->db->order_by($order_column[$params["order"][0]["column"]],$params["order"][0]["dir"]);
			}
			
		}

		$q=$this->db->get();
        return $q !== FALSE ? $q->result() : array();

	}

	public function getColourList($params,$type=1){

		//echo '<pre>';print_r($params);exit;
		$order_column = array('c.id','c.name','c.order_no','c.status','c.id');
		$select = '*';
		$where = array(
			'c.status !=' =>	3
		);
		
		$this->db->select($select)->from('colors c')->where($where);

		if(isset($params["search"]["value"]) && !empty($params["search"]["value"]) )
		{ 
			$val = trim($params["search"]["value"]);
			$this->db->where("c.name like '%".$val."%' ");
			$this->db->or_where("c.order_no like '%".$val."%' ");
		}
		
		if( $type == 1 ){
			$this->db->limit($params['length'], $params['start']);

			if( isset($params["order"][0]["column"]) && !empty($params["order"][0]["column"]) ){
				$this->db->order_by($order_column[$params["order"][0]["column"]],$params["order"][0]["dir"]);
			}
			
		}

		$q=$this->db->get();
        return $q !== FALSE ? $q->result() : array();

	}

	public function getProductList($params,$type=1){

		//echo '<pre>';print_r($params);exit;
		$order_column = array('p.id','c.catName','sc.subcatName','b.brandName','p.product_name','p.product_code','p.status','p.id');
		$select = 'p.id,c.catName,sc.subcatName,b.brandName,p.product_name,p.product_code,p.status,p.draft,p.publish,p.request';
		$where = array(
			'p.status !=' =>	3,
			'c.status !=' =>	3,
			'sc.status !='=>	3,
			'b.status !=' =>	3,
		);
		
		$this->db->select($select)->from('product p')
			->join('category c','c.id=p.cat_id')
			->join('sub_category sc','sc.id=p.subcat_id')
			->join('brand b','b.id=brand_id')
			->where($where);

		if(isset($params["search"]["value"]) && !empty($params["search"]["value"]) )
		{ 
			$val = trim($params["search"]["value"]);
			$this->db->where("p.product_name like '%".$val."%' ");
			$this->db->or_where("p.product_code like '%".$val."%' ");
			$this->db->or_where("b.brandName like '%".$val."%' ");
			$this->db->or_where("c.catName like '%".$val."%' ");
			$this->db->or_where("sc.subcatName like '%".$val."%' ");
		}
		
		if( $type == 1 ){
			$this->db->limit($params['length'], $params['start']);

			if( isset($params["order"][0]["column"]) && !empty($params["order"][0]["column"]) ){
				$this->db->order_by($order_column[$params["order"][0]["column"]],$params["order"][0]["dir"]);
			}
			
		}

		$q=$this->db->get();
        return $q !== FALSE ? $q->result() : array();

	}

	public function getCategoryItemCount($type = 0){

		$result = array();
		$category = $this->Master_db->getRecords('category',array('status !='=>3),'id,catName');
		//echo '<pre>';print_r($category);exit;

		foreach ($category as $row) {
			
			$catData = array(
				'catId'		=>	$row->id,
				'catName'	=>	$row->catName,
				'subCat'	=>	array()
			);

			$subcategory = $this->getRecords('sub_category',array('status !='=>3,'cat_id'=>$row->id),'id,subcatName');

			foreach ($subcategory as $srow) {
				
				$itemCount = 0;
				$where = array(
					'cat_id'	=>	$row->id,
					'subcat_id'	=>	$srow->id,
					//'draft'		=>	1,
					'status !='	=>	3
				);

				if( $type == 3 ){ $where['request'] = 1; }
				$items = $this->getRecords('product',$where,'count(id) as itemCount');
				if( count($items) ){
					$itemCount = $items[0]->itemCount;
				}

				$catData['subCat'][] = array(
					'subcatId'		=>	$srow->id,
					'subcatName'	=>	$srow->subcatName,
					'itemCount'		=>	$itemCount
				);

			}

			$result[] = $catData;
			
		}
		
		return $result;
		
	}

	public function getProductsList($type = 0,$catId = 0,$subcatId = 0){

		$result = array();

		$where = array('status !='=>3);
		if( $catId != 0 ){ $where['id'] = $catId; }
		$category = $this->Master_db->getRecords('category',$where,'id,catName');
		//echo '<pre>';print_r($category);exit;

		foreach ($category as $row) {
			
			$catData = array(
				'catId'		=>	$row->id,
				'catName'	=>	$row->catName,
				'subCat'	=>	array()
			);

			$condition = array('status !='=>3,'cat_id'=>$row->id);
			if( $catId != 0 ){ $condition['id'] = $subcatId; }

			$subcategory = $this->getRecords('sub_category',$condition,'id,subcatName');

			foreach ($subcategory as $srow) {
				$where = array(
					'p.cat_id'		=>	$row->id,
					'p.subcat_id'	=>	$srow->id,
				);
				$products = $this->getProducts($type,$where);
				$catData['subCat'][] = array(
					'subcatName'	=>	$srow->subcatName,
					'products'		=>	$products,
				);
			}

			$result[] = $catData;	
		}

		return $result;

	}

	public function getProducts($type = 0, $condition = array(), $limit = 10, $skip = 0){


		$select = 'p.id,p.product_name,p.product_code,p.payment_type,p.total_ratings,p.rating,GROUP_CONCAT(pf.path) as images,c.catName,sc.subcatName,b.brandName,p.details,p.cat_id,p.subcat_id,p.brand_id,p.color_id';
		//GROUP_CONCAT(pf.path) as images

		$where = array(
			'p.status'		=>	1,
			'b.status !='	=>	3,
			'c.status !='	=>	3,
			'sc.status !='	=>	3,
			'pf.status !='	=>	3,
			'pf.type'	 	=>	1,
			//'p.id !='		=>	null
		);

		$where = array_merge($where,$condition);
		// if( $cat_id != 0 ){ $where['p.cat_id'] = $cat_id; }
		// if( $subcat_id != 0 ){ $where['p.subcat_id'] = $subcat_id; }

		if( $type == 1 ){
			$where['draft'] = 2;
		}else if( $type == 2 ){
			$where['draft'] = 1;
		}else if( $type == 3 ){
			$where['request'] = 1;
		}

		$join_arr = array(
			array(
				'table' => 'brand b',
				'on'	=>	'b.id = p.brand_id',
				'type'	=>	'',
			),
			array(
				'table' => 'category c',
				'on'	=>	'c.id = p.cat_id',
				'type'	=>	'',
			),
			array(
				'table' => 'sub_category sc',
				'on'	=>	'sc.id = p.subcat_id',
				'type'	=>	'',
			),
			array(
				'table' => 'product_files pf',
				'on'	=>	'pf.product_id = p.id',
				'type'	=>	'left',
			)
		);		

		$data = $this->getRecordsByJoin('product p',$where,$select,$join_arr,array('p.id','asc'),'p.id',$limit,$skip);
		//echo $this->db->last_query();exit;
		return $data;


	}

	public function getProductGeneral($product_id = 0){

	}

	public function getProductSpecification($product_id = 0){
		
		$result = array();
		$product_category = $this->getRecords('product_category',array('product_id'=>$product_id,'status!='=>3),'id,label','id asc');

		foreach ($product_category as $item) {

			$catData = array();
			$where = array(
				'product_id'	=>	$product_id,
				'product_cat_id'=>	$item->id,
				'status !='		=>	3
			);
			$product_category = $this->getRecords('product_category_items',$where,'id,label,description,publish','id asc');
			$catData['cat_id'] = $item->id;
			$catData['catName'] = $item->label;
			$catData['specs'] = $product_category;
			$result[] = $catData;

		}
		return $result;

	}

}
?>