<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Master extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('Master_db');
        $this->load->helper('common');
	}

	public function index_get()
	{
		notFound($this);
	}

	public function index_post()
	{
		notFound($this);
	}

    /** category functions */
	public function category_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['catName']) && !empty($_POST['orderNo']) ){
                $catName = trim(htmlspecialchars($this->input->post('catName')));
                $orderNo = trim(htmlspecialchars($this->input->post('orderNo')));

                $where = array(
                    'catName' 	=>	$catName,
                    'status !='	=>	3,
                );
                $check = $this->Master_db->getRecords('category',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Category already exists!!!'));
                }else{
                    $category = [
                        'catName'       =>  $catName,
                        'displayName'   =>  $catName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'status'        =>  1,
                        'created_at'    =>  date('Y-m-d H:i:s'),
                        'created_by'    =>  0,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->insertRecord('category',$category);
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }			
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}

    public function categoryList_post(){

        //tokenErr($this,array('message'=>'Unauthorized access'));
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $result = [];
            $data = $this->Master_db->getCategoryList($this->input->post(),1);

            $i = $_POST["start"]+1;
            foreach($data as $row){
                $tmp_row = array();
                $tmp_row[] = $i++;
                $tmp_row[] = $row->catName;
                $tmp_row[] = $row->order_no;

                $status = '';
                $action = '';
                if( $row->status == 1 ){
                    $status = '<span class="badge badge-primary">Active</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',2)" class="btn waves-effect waves-light btn-sm btn-secondary"><i class="far fa-stop-circle"></i></button>';
                }else if( $row->status == 2 ){
                    $status = '<span class="badge badge-warning">Inactive</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',1)" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-check-square"></i></button>';
                }

                $tmp_row[] = $status;
                $action .= '&nbsp;<button type="button" onclick="saveCategory(2,'.$row->id.')" class="btn waves-effect waves-light btn-sm btn-warning"><i class="fas fa-edit"></i></button>';
                $action .= '&nbsp;<button type="button" onclick="deleteItem('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';
                $tmp_row[] = $action;

                $result[] = $tmp_row;
            }

            $res    = $this->Master_db->getCategoryList($this->input->post(),2);
            $total  = count($res);
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  count($res),
                "recordsFiltered"   =>  count($res),
                "data"              =>  $result
            );			
            echo json_encode($output);exit;
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
        

    }

    public function category_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $where = array('status !='=>3);
            if( !empty($_GET['catId']) ){
                $catId = trim(htmlspecialchars($this->input->get('catId')));
                $where['id'] = $catId;
            }
            $check = $this->Master_db->getRecords('category',$where,'id,catName,order_no','order_no asc');
            success($this,['message'=>'Category list','data'=>$check]);	
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function category_patch(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_GET['catName']) && !empty($_GET['orderNo']) && !empty($_GET['catId']) ){
                $catName = trim(htmlspecialchars($this->input->get('catName')));
                $orderNo = trim(htmlspecialchars($this->input->get('orderNo')));
                $catId = trim(htmlspecialchars($this->input->get('catId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $catId
                );
                $check = $this->Master_db->getRecords('category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Category not found!!!'));
                }
                
                $where = array(
                    'catName' 	=>	$catName,
                    'status !='	=>	3,
                    'id !='     =>  $catId
                );
                $check = $this->Master_db->getRecords('category',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Category already exists!!!'));
                }else{
                    $category = [
                        'catName'       =>  $catName,
                        'displayName'   =>  $catName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('category',$category,array('id'=>$catId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function category_put(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['catId']) && !empty($_GET['status']) ){
                $catId = trim(htmlspecialchars($this->input->get('catId')));
                $status = trim(htmlspecialchars($this->input->get('status')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $catId
                );
                $check = $this->Master_db->getRecords('category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Category not found!!!'));
                }

                $update = [
                    'status'        =>  $status,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('category',$update,array('id'=>$catId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function category_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['catId']) ){
                $catId = trim(htmlspecialchars($this->input->get('catId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $catId
                );
                $check = $this->Master_db->getRecords('category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Category not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('category',$update,array('id'=>$catId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    /** subcategory functions */

    public function subcategoryList_post(){

        //tokenErr($this,array('message'=>'Unauthorized access'));
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $result = [];
            $data = $this->Master_db->getSubCategoryList($this->input->post(),1);
            //echo '<pre>';print_r($data);exit;
            $i = $_POST["start"]+1;
            foreach($data as $row){
                $tmp_row = array();
                $tmp_row[] = $i++;
                $tmp_row[] = $row->subcatName;
                $tmp_row[] = $row->order_no;
                $tmp_row[] = $row->catName;

                $status = '';
                $action = '';
                if( $row->status == 1 ){
                    $status = '<span class="badge badge-primary">Active</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',2)" class="btn waves-effect waves-light btn-sm btn-secondary"><i class="far fa-stop-circle"></i></button>';
                }else if( $row->status == 2 ){
                    $status = '<span class="badge badge-warning">Inactive</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',1)" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-check-square"></i></button>';
                }

                $tmp_row[] = $status;
                $action .= '&nbsp;<button type="button" onclick="savesubCategory(2,'.$row->id.')" class="btn waves-effect waves-light btn-sm btn-warning"><i class="fas fa-edit"></i></button>';
                $action .= '&nbsp;<button type="button" onclick="deleteItem('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';
                $tmp_row[] = $action;

                $result[] = $tmp_row;
            }

            $res    = $this->Master_db->getSubCategoryList($this->input->post(),2);
            $total  = count($res);
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  count($res),
                "recordsFiltered"   =>  count($res),
                "data"              =>  $result
            );			
            echo json_encode($output);exit;
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
        

    }

	public function subcategory_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['cat_id']) && !empty($_POST['subcatName']) && !empty($_POST['orderNo']) ){
                $cat_id = trim(htmlspecialchars($this->input->post('cat_id')));
                $subcatName = trim(htmlspecialchars($this->input->post('subcatName')));
                $orderNo = trim(htmlspecialchars($this->input->post('orderNo')));

                $where = array(
                    'subcatName' 	=>	$subcatName,
                    'status !='	    =>	3,
                    'cat_id'        =>  $cat_id,
                );
                $check = $this->Master_db->getRecords('sub_category',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Subcategory already exists!!!'));
                }else{
                    $category = [
                        'cat_id'        =>  $cat_id,
                        'subcatName'    =>  $subcatName,
                        'displayName'   =>  $subcatName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'status'        =>  1,
                    ];
                    //echo '<pre>';print_r($category);exit;
                    $this->Master_db->insertRecord('sub_category',$category);
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }			
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}

    public function subcategory_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $where = array('status !='=>3);
            if( !empty($_GET['subcatId']) ){
                $subcatId = trim(htmlspecialchars($this->input->get('subcatId')));
                $where['id'] = $subcatId;
            }

            if( !empty($_GET['catId']) ){
                $catId = trim(htmlspecialchars($this->input->get('catId')));
                $where['cat_id'] = $catId;
            }
            $check = $this->Master_db->getRecords('sub_category',$where,'id,cat_id,subcatName,order_no','order_no asc');
            success($this,['message'=>'Subcategory list','data'=>$check]);	
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function subcategory_patch(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_GET['subcatName']) && !empty($_GET['orderNo']) && !empty($_GET['cat_id']) && !empty($_GET['subcat_id']) ){
                $subcatName = trim(htmlspecialchars($this->input->get('subcatName')));
                $orderNo = trim(htmlspecialchars($this->input->get('orderNo')));
                $catId = trim(htmlspecialchars($this->input->get('cat_id')));
                $subcat_id = trim(htmlspecialchars($this->input->get('subcat_id')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $subcat_id,
                    'cat_id'    =>  $catId,
                );
                $check = $this->Master_db->getRecords('sub_category',$where,'id');
                //echo '<pre>';print_r($check);exit;
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Subcategory not found!!!'));
                }
                
                $where = array(
                    'subcatName' 	=>	$subcatName,
                    'status !='	    =>	3,
                    'id !='         =>  $subcat_id,
                    'cat_id'        =>  $catId
                );
                $check = $this->Master_db->getRecords('sub_category',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Subcategory already exists!!!'));
                }else{
                    $category = [
                        'cat_id'        =>  $catId,
                        'subcatName'    =>  $subcatName,
                        'displayName'   =>  $subcatName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('sub_category',$category,array('id'=>$subcat_id));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function subcategory_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['subcat_id']) ){
                $subcat_id = trim(htmlspecialchars($this->input->get('subcat_id')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $subcat_id
                );
                $check = $this->Master_db->getRecords('sub_category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Subcategory not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('sub_category',$update,array('id'=>$subcat_id));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function subcategory_put(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['subcat_id']) && !empty($_GET['status']) ){
                $subcat_id = trim(htmlspecialchars($this->input->get('subcat_id')));
                $status = trim(htmlspecialchars($this->input->get('status')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $subcat_id
                );
                $check = $this->Master_db->getRecords('sub_category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Subcategory not found!!!'));
                }

                $update = [
                    'status'        =>  $status,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('sub_category',$update,array('id'=>$subcat_id));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    /** brand functions */

    public function brandsList_post(){

        //tokenErr($this,array('message'=>'Unauthorized access'));
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $result = [];
            $data = $this->Master_db->getBrandList($this->input->post(),1);

            $i = $_POST["start"]+1;
            foreach($data as $row){
                $tmp_row = array();
                $tmp_row[] = $i++;
                $tmp_row[] = $row->brandName;
                $tmp_row[] = $row->order_no;

                $status = '';
                $action = '';
                if( $row->status == 1 ){
                    $status = '<span class="badge badge-primary">Active</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',2)" class="btn waves-effect waves-light btn-sm btn-secondary"><i class="far fa-stop-circle"></i></button>';
                }else if( $row->status == 2 ){
                    $status = '<span class="badge badge-warning">Inactive</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',1)" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-check-square"></i></button>';
                }

                $tmp_row[] = $status;
                $action .= '&nbsp;<button type="button" onclick="saveBrand(2,'.$row->id.')" class="btn waves-effect waves-light btn-sm btn-warning"><i class="fas fa-edit"></i></button>';
                $action .= '&nbsp;<button type="button" onclick="deleteItem('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';
                $tmp_row[] = $action;

                $result[] = $tmp_row;
            }

            $res    = $this->Master_db->getBrandList($this->input->post(),2);
            $total  = count($res);
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  count($res),
                "recordsFiltered"   =>  count($res),
                "data"              =>  $result
            );			
            echo json_encode($output);exit;
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
        

    }

	public function brand_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['brandName']) && !empty($_POST['orderNo']) ){
                $brandName = trim(htmlspecialchars($this->input->post('brandName')));
                $orderNo = trim(htmlspecialchars($this->input->post('orderNo')));

                $where = array(
                    'brandName' =>	$brandName,
                    'status !='	=>	3,
                );
                $check = $this->Master_db->getRecords('brand',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Brand already exists!!!'));
                }else{
                    $category = [
                        'brandName'     =>  $brandName,
                        'displayName'   =>  $brandName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'status'        =>  1,
                        'created_at'    =>  date('Y-m-d H:i:s'),
                        'created_by'    =>  0,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->insertRecord('brand',$category);
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }			
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}

    public function brand_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $where = array('status !='=>3);
            if( !empty($_GET['brand_id']) ){
                $brand_id = trim(htmlspecialchars($this->input->get('brand_id')));
                $where['id'] = $brand_id;
            }
            $check = $this->Master_db->getRecords('brand',$where,'id,brandName,order_no','order_no asc');
            success($this,['message'=>'Brand list','data'=>$check]);	
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function brand_patch(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_GET['brandName']) && !empty($_GET['orderNo']) && !empty($_GET['brandId']) ){
                $brandName = trim(htmlspecialchars($this->input->get('brandName')));
                $orderNo = trim(htmlspecialchars($this->input->get('orderNo')));
                $brandId = trim(htmlspecialchars($this->input->get('brandId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $brandId
                );
                $check = $this->Master_db->getRecords('brand',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Brand not found!!!'));
                }
                
                $where = array(
                    'brandName' =>	$brandName,
                    'status !='	=>	3,
                    'id !='     =>  $brandId
                );
                $check = $this->Master_db->getRecords('brand',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Brand already exists!!!'));
                }else{
                    $category = [
                        'brandName'     =>  $brandName,
                        'displayName'   =>  $brandName,
                        'image_url'     =>  '',
                        'order_no'      =>  $orderNo,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('brand',$category,array('id'=>$brandId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function brand_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['brandId']) ){
                $brandId = trim(htmlspecialchars($this->input->get('brandId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $brandId
                );
                $check = $this->Master_db->getRecords('brand',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Brand not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('brand',$update,array('id'=>$brandId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function brand_put(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['brandId']) && !empty($_GET['status']) ){
                $brandId = trim(htmlspecialchars($this->input->get('brandId')));
                $status = trim(htmlspecialchars($this->input->get('status')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $brandId
                );
                $check = $this->Master_db->getRecords('brand',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Brand not found!!!'));
                }

                $update = [
                    'status'        =>  $status,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('brand',$update,array('id'=>$brandId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    /** Colour Functions */

    public function colourList_post(){

        //tokenErr($this,array('message'=>'Unauthorized access'));
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $result = [];
            $data = $this->Master_db->getColourList($this->input->post(),1);

            $i = $_POST["start"]+1;
            foreach($data as $row){
                $tmp_row = array();
                $tmp_row[] = $i++;
                $tmp_row[] = $row->name;
                $tmp_row[] = $row->order_no;

                $status = '';
                $action = '';
                if( $row->status == 1 ){
                    $status = '<span class="badge badge-primary">Active</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',2)" class="btn waves-effect waves-light btn-sm btn-secondary"><i class="far fa-stop-circle"></i></button>';
                }else if( $row->status == 2 ){
                    $status = '<span class="badge badge-warning">Inactive</span>';
                    $action = '<button type="button" onclick="itemStatus('.$row->id.',1)" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-check-square"></i></button>';
                }

                $tmp_row[] = $status;
                $action .= '&nbsp;<button type="button" onclick="saveColour(2,'.$row->id.')" class="btn waves-effect waves-light btn-sm btn-warning"><i class="fas fa-edit"></i></button>';
                $action .= '&nbsp;<button type="button" onclick="deleteItem('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';
                $tmp_row[] = $action;

                $result[] = $tmp_row;
            }

            $res    = $this->Master_db->getColourList($this->input->post(),2);
            $total  = count($res);
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  count($res),
                "recordsFiltered"   =>  count($res),
                "data"              =>  $result
            );			
            echo json_encode($output);exit;
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
        

    }

    public function colour_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['name']) && !empty($_POST['orderNo']) ){
                $name = trim(htmlspecialchars($this->input->post('name')));
                $orderNo = trim(htmlspecialchars($this->input->post('orderNo')));

                $where = array(
                    'name'      =>	$name,
                    'status !='	=>	3,
                );
                $check = $this->Master_db->getRecords('colors',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Colour already exists!!!'));
                }else{
                    $category = [
                        'name'          =>  $name,
                        'order_no'      =>  $orderNo,
                        'status'        =>  1,
                        'created_at'    =>  date('Y-m-d H:i:s'),
                        'created_by'    =>  0,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->insertRecord('colors',$category);
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }			
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}

    public function colour_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $where = array('status !='=>3);
            if( !empty($_GET['colourId']) ){
                $colourId = trim(htmlspecialchars($this->input->get('colourId')));
                $where['id'] = $colourId;
            }
            $check = $this->Master_db->getRecords('colors',$where,'id,name,order_no','order_no asc');
            success($this,['message'=>'Colour list','data'=>$check]);	
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function colour_patch(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_GET['name']) && !empty($_GET['orderNo']) && !empty($_GET['colourId']) ){
                $name = trim(htmlspecialchars($this->input->get('name')));
                $orderNo = trim(htmlspecialchars($this->input->get('orderNo')));
                $colourId = trim(htmlspecialchars($this->input->get('colourId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $colourId
                );
                $check = $this->Master_db->getRecords('colors',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Colour not found!!!'));
                }
                
                $where = array(
                    'name'      =>	$name,
                    'status !='	=>	3,
                    'id !='     =>  $colourId
                );
                $check = $this->Master_db->getRecords('colors',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Colour already exists!!!'));
                }else{
                    $category = [
                        'name'          =>  $name,
                        'order_no'      =>  $orderNo,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('colors',$category,array('id'=>$colourId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function colour_put(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['colourId']) && !empty($_GET['status']) ){
                $colourId = trim(htmlspecialchars($this->input->get('colourId')));
                $status = trim(htmlspecialchars($this->input->get('status')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $colourId
                );
                $check = $this->Master_db->getRecords('colors',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Colour not found!!!'));
                }

                $update = [
                    'status'        =>  $status,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('colors',$update,array('id'=>$colourId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function colour_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['colourId']) ){
                $colourId = trim(htmlspecialchars($this->input->get('colourId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $colourId
                );
                $check = $this->Master_db->getRecords('colors',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Colour not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('colors',$update,array('id'=>$colourId));
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    /** product functions */
	public function product_general_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            
            $productId = 0;
            $this->load->library('s3');
            $sharedConfig = [
                //'profile' => 'default',
                'region' => $this->config->item('aws_region'),
                'version' => $this->config->item('aws_version'),
                'credentials' => array(
                    'key'    => $this->config->item('aws_access_key'),
                    'secret' => $this->config->item('aws_secret_key')
                )
            ];
            $allowedImages =  array('jpeg','png' ,'jpg');
            $allowedVideos =  array('mp4');

            //echo '<pre>';print_r($_FILES);print_r($_POST);exit;
            if( !empty($_POST['productName']) && !empty($_POST['brandId']) && !empty($_POST['catId'])
                && !empty($_POST['subcatId']) && !empty($_POST['productCode']) && !empty($_POST['paymentType']) 
                && !empty($_POST['productId'])  ){
                
                $productId = trim(htmlspecialchars($this->input->post('productId')));
                $productName = trim(htmlspecialchars($this->input->post('productName')));
                $productCode = trim(htmlspecialchars($this->input->post('productCode')));
                $brandId = trim(htmlspecialchars($this->input->post('brandId')));
                $catId = trim(htmlspecialchars($this->input->post('catId')));
                $subcatId = trim(htmlspecialchars($this->input->post('subcatId')));
                $paymentType = trim(htmlspecialchars($this->input->post('paymentType')));

                $colors = array();
                if( !empty($_POST['colourId']) ){
                    $colors = $this->input->post('colourId');
                }
                //echo '<pre>';print_r($colors);exit;

                $product = $this->Master_db->getRecords('product',array('id'=>$productId,'status!='=>3),'id');
                if( count($product) == 0 ){ clientErr($this,array('message'=>'Product not found!!!')); }

                $brand = $this->Master_db->getRecords('brand',array('id'=>$brandId,'status!='=>3),'id');
                if( count($brand) == 0 ){ clientErr($this,array('message'=>'Brand not found!!!')); }

                $category = $this->Master_db->getRecords('category',array('id'=>$catId,'status!='=>3),'id');
                if( count($category) == 0 ){ clientErr($this,array('message'=>'Category not found!!!')); }

                $sub_category = $this->Master_db->getRecords('sub_category',array('id'=>$subcatId,'status!='=>3),'id');
                if( count($sub_category) == 0 ){ clientErr($this,array('message'=>'Subcategory not found!!!')); }

                $where = array(
                    'product_code'  =>	$productCode,
                    'status !='	    =>	3,
                    'id !='         =>  $productId
                );
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Product identifier already exists!!!'));
                }else{
                    $category = [
                        'product_name'  =>  $productName,
                        'brand_id'      =>  $brandId,
                        'cat_id'        =>  $catId,
                        'subcat_id'     =>  $subcatId,
                        'color_id'      =>  $colors,
                        'product_code'  =>  $productCode,
                        'payment_type'  =>  $paymentType,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $product_id = $this->Master_db->updateRecord('product',$category,array('id'=>$productId));
                    if( $product_id ){

                        if( !empty($_POST['deletedFiles']) ){
                            $deletedFiles = trim(htmlspecialchars($this->input->post('deletedFiles')));
                            $deletedFiles = explode(',',$deletedFiles);
                            foreach($deletedFiles as $fileId){
                                $update = array(
                                    'status'        =>  3,
                                    'updated_by'    =>  0,
                                    'updated_at'    =>  date('Y-m-d H:i:s'),
                                );
                                $this->Master_db->updateRecord('product_files',$update,array('product_id'=>$productId,'id'=>$fileId));
                            }
                        }

                        if( isset($_FILES['files']) && count($_FILES['files']) ){

                            $f = 0;
                            foreach($_FILES['files'] as $filedata){

                                $n = 0;
                                foreach($filedata as $name){

                                    $file = $name;
                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                    if( $ext != '' ){

                                        if( in_array($ext,$allowedImages) ){
                                            $type = 1;
                                        }else if( in_array($ext,$allowedVideos) ){
                                            $type = 2;
                                        }
                                        $file = $product_id.'_'.rand(10,100).'.'.$ext;
                                        $filename = $this->config->item('aws_path').$file;
                                        //echo "File name : ".$filename.'<br>';
                                        if ( $this->s3->uploadObject($sharedConfig,$this->config->item('aws_bucket'),$filename,$_FILES['files']['tmp_name'][$n]) ){
                                            //$filePath = $this->config->item('aws_url').$this->config->item('aws_path').$_FILES['files']['name'][$i];
                                            $filePath = $this->config->item('aws_url').$filename;
                                            //echo $filePath;exit;
                                
                                            $insertFile = array(
                                                'product_id'    =>  $product_id,
                                                'type'          =>  $type,
                                                'path'          =>  $filePath,
                                                'mime_type'     =>  $_FILES['files']['type'][$n],
                                                'size'          =>  $_FILES['files']['size'][$n],
                                                'file_name'     =>  $file,
                                                'status'        =>  1,
                                            );
                                            
                                            //echo '<pre>';print_r($insertFile);exit;
                                            $file_id = $this->Master_db->insertRecord('product_files',$insertFile);
                                            //success($this,['message'=>'File upload successfully','path'=>$filePath,'file_id'=>$file_id]);	
                                        }
                                    
                                    }
                                    $n++;

                                }
                                $f++;
                                //print_r($filedata);exit;

                            }
                        
                        }

                        success($this,['message'=>'Saved successfully','product_id'=>$product_id]);

                    }else{
                        clientErr($this,array('message'=>'Something went wrong!!!'));
                    }
                }
            }else if( !empty($_POST['productName']) && !empty($_POST['brandId']) && !empty($_POST['catId'])
                && !empty($_POST['subcatId']) && !empty($_POST['productCode']) && !empty($_POST['paymentType']) 
                && empty($_POST['productId'])  ){

                $productName = trim(htmlspecialchars($this->input->post('productName')));
                $productCode = trim(htmlspecialchars($this->input->post('productCode')));
                $brandId = trim(htmlspecialchars($this->input->post('brandId')));
                $catId = trim(htmlspecialchars($this->input->post('catId')));
                $subcatId = trim(htmlspecialchars($this->input->post('subcatId')));
                $paymentType = trim(htmlspecialchars($this->input->post('paymentType')));

                $colors = array();
                if( !empty($_POST['colourId']) ){
                    $colors = $this->input->post('colourId');
                }

                $brand = $this->Master_db->getRecords('brand',array('id'=>$brandId,'status!='=>3),'id');
                if( count($brand) == 0 ){ clientErr($this,array('message'=>'Brand not found!!!')); }

                $category = $this->Master_db->getRecords('category',array('id'=>$catId,'status!='=>3),'id');
                if( count($category) == 0 ){ clientErr($this,array('message'=>'Category not found!!!')); }

                $sub_category = $this->Master_db->getRecords('sub_category',array('id'=>$subcatId,'status!='=>3),'id');
                if( count($sub_category) == 0 ){ clientErr($this,array('message'=>'Subcategory not found!!!')); }

                $where = array(
                    'product_code'  =>	$productCode,
                    'status !='	    =>	3,
                );
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) ){
                    clientErr($this,array('message'=>'Product identifier already exists!!!'));
                }else{
                    $category = array(
                        'product_name'  =>  $productName,
                        'brand_id'      =>  $brandId,
                        'cat_id'        =>  $catId,
                        'subcat_id'     =>  $subcatId,
                        'color_id'      =>  $colors,
                        'product_code'  =>  $productCode,
                        'draft'         =>  1,
                        'publish'       =>  2,
                        'payment_type'  =>  $paymentType,
                        'status'        =>  1,
                        'created_at'    =>  date('Y-m-d H:i:s'),
                        'created_by'    =>  0,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    );
                    $product_id = $this->Master_db->insertRecord('product',$category);
                    //$product_id = 1;
                    if( $product_id ){

                        if( isset($_FILES['files']) && count($_FILES['files']) ){

                            $f = 0;
                            foreach($_FILES['files'] as $filedata){

                                $n = 0;
                                foreach($filedata as $name){

                                    $file = $name;
                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                    if( in_array($ext,$allowedImages) ){
                                        $type = 1;
                                    }else if( in_array($ext,$allowedVideos) ){
                                        $type = 2;
                                    }
                                    $file = $product_id.'_'.rand(10,100).'.'.$ext;
                                    $filename = $this->config->item('aws_path').$file;
                                    //echo $filename;exit;

                                    if ( $this->s3->uploadObject($sharedConfig,$this->config->item('aws_bucket'),$filename,$_FILES['files']['tmp_name'][$n]) ){
                                        //$filePath = $this->config->item('aws_url').$this->config->item('aws_path').$_FILES['files']['name'][$i];
                                        $filePath = $this->config->item('aws_url').$filename;
                                        //echo $filePath;exit;
                            
                                        $insertFile = array(
                                            'product_id'    =>  $product_id,
                                            'type'          =>  $type,
                                            'path'          =>  $filePath,
                                            'mime_type'     =>  $_FILES['files']['type'][$n],
                                            'size'          =>  $_FILES['files']['size'][$n],
                                            'file_name'     =>  $file,
                                            'status'        =>  1,
                                        );
                                        
                                        //echo '<pre>';print_r($insertFile);exit;
                                        $file_id = $this->Master_db->insertRecord('product_files',$insertFile);
                                        //success($this,['message'=>'File upload successfully','path'=>$filePath,'file_id'=>$file_id]);	
                                    }

                                    $n++;
                                }
                                $f++;
                                //print_r($filedata);exit;

                            }
                        
                        }

                        success($this,['message'=>'Saved successfully','product_id'=>$product_id]);
                    }else{
                        clientErr($this,array('message'=>'Something went wrong!!!'));
                    }
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }			
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
	}

    public function product_general_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $select = 'id,product_name,brand_id,cat_id,product_code,details,publish,status';
            $where = array('status !='=>3);
            if( !empty($_GET['productId']) ){
                $where['id'] = trim(htmlspecialchars($this->input->get('productId')));
            }
            $check = $this->Master_db->getRecords('product',$where,$select,'id desc');
            success($this,['message'=>'Products','data'=>$check]);	
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function product_detail_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['productId']) && !empty($_POST['details']) ){
                $productId = trim(htmlspecialchars($this->input->post('productId')));
                $details = trim($this->input->post('details'));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $productId
                );
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product not found!!!'));
                }else{
                    $data = [
                        'details'       =>  $details,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('product',$data,array('id'=>$productId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    // public function product_specs_post(){
    //     if( checkAuthorization($this->input->request_headers()) == 1 ){
    //         if( !empty($_POST['productId']) && !empty($_POST['category']) && count($_POST['category']) ){
    //             $productId = trim(htmlspecialchars($this->input->post('productId')));
    //             $category = $this->input->post('category');

    //             foreach($category as $row){
    //                 if( empty($row['name']) ){
    //                     clientErr($this,array('message'=>'Required fields are missing!!!'));
    //                 }

    //                 if( !empty($row['name']) && !empty($row['id']) ){
    //                     $where = array('id'=>$row['id'],'product_id'=>$productId,'status != '=>3);
    //                     $check = $this->Master_db->getRecords('product_category',$where,'id');
    //                     if( count($check) == 0 ){
    //                         clientErr($this,array('message'=>'Category not found!!!'));
    //                     }                        
    //                 }
    //             }

    //             $where = array(
    //                 'status !='	=>	3,
    //                 'id'        =>  $productId
    //             );
    //             $check = $this->Master_db->getRecords('product',$where,'id');
    //             if( count($check) == 0 ){
    //                 clientErr($this,array('message'=>'Product not found!!!'));
    //             }else{
    //                 foreach($category as $row){
    //                     if( isset($row['id']) && !empty($row['name']) ){
    //                         $id = trim(htmlspecialchars($row['id']));
    //                         $update = [
    //                             'product_id'    =>  $productId,
    //                             'label'         =>  trim($row['name']),
    //                             'updated_by'    =>  0,
    //                             'updated_at'    =>  date('Y-m-d H:i:s'),
    //                         ];
    //                         $this->Master_db->updateRecord('product_category',$update,array('id'=>$id,'product_id'=>$productId));
    //                     }else if( !empty($row['name']) ){
    //                         $insert = [
    //                             'product_id'    =>  $productId,
    //                             'label'         =>  trim($row['name']),
    //                             'status'        =>  1,
    //                             'created_at'    =>  date('Y-m-d H:i:s'),
    //                             'created_by'    =>  0,
    //                             'updated_by'    =>  0,
    //                             'updated_at'    =>  date('Y-m-d H:i:s'),
    //                         ];
    //                         $this->Master_db->insertRecord('product_category',$insert);
    //                     }
    //                 }
    //                 //echo '<pre>';print_r($category);exit;
    //                 success($this,['message'=>'Saved successfully']);
    //             }
    //         }else{
    //             clientErr($this,array('message'=>'Required fields are missing!!!'));
    //         }
    //     }else{
    //         tokenErr($this,array('message'=>'Unauthorized access'));
    //     }
	// }

    public function product_specs_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){

            //echo '<pre>';print_r($_POST);exit;
            if( !empty($_POST['productId']) && !empty($_POST['categoryData']) && count($_POST['categoryData']) ){
                
                $productId = trim(htmlspecialchars($this->input->post('productId')));
                $category = $this->input->post('categoryData');

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $productId
                );
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product not found!!!'));
                }
                
                foreach($category as $row){
                    // if( empty($row['name']) ){
                    //     clientErr($this,array('message'=>'Required fields are missing!!!'));
                    // }

                    if( !empty($row['categoryName']) && !empty($row['categoryId']) ){
                        $categoryName = trim(htmlspecialchars($this->input->post('categoryName')));
                        $where = array('id'=>$row['categoryId'],'product_id'=>$productId,'status != '=>3);
                        $check = $this->Master_db->getRecords('product_category',$where,'id');
                        if( count($check) == 0 ){
                            clientErr($this,array('message'=>'Category not found!!!'));
                        }

                        if( isset($row['specData']) && count($row['specData']) ){
                            $specData = $row['specData'];
                            foreach($specData as $spec){
                                if( !empty($spec['specId']) ){
                                    $specId = trim(htmlspecialchars($spec['specId']));
                                    $specStatus = trim(htmlspecialchars($spec['specStatus']));
                                    $specName = trim(htmlspecialchars($spec['specName']));
                                    $specDesc = trim(htmlspecialchars($spec['specDesc']));

                                    $where = array(
                                        'product_id'    =>  $productId,
                                        'product_cat_id'=>  $row['categoryId'],
                                        'status != '    =>  3
                                    );
                                    $check = $this->Master_db->getRecords('product_category_items',$where,'id');
                                    if( count($check) == 0 ){
                                        clientErr($this,array('message'=>'Product specification not found!!!'));
                                    }
                                }
                            }
                        }
                    }
                }

                $removeCategory = array();
                $removedSpec = array();

                //echo '<pre>';print_r($_POST);exit;
                if( isset($_POST['deletedCategory']) && count($_POST['deletedCategory']) ){
                    $removeCategory = $this->input->post('deletedCategory');
                    foreach($removeCategory as $id){
                        $where = array(
                            'status !='	=>	3,
                            'id'        =>  $id,
                            'product_id'=>  $productId
                        );
                        $check = $this->Master_db->getRecords('product_category',$where,'id');
                        if( count($check) == 0 ){
                            clientErr($this,array('message'=>'Product category not found!!!'));
                        }
                    }
                }

                if( isset($_POST['deletedSpec']) && count($_POST['deletedSpec']) ){
                    $removedSpec = $this->input->post('deletedSpec');
                    foreach($removedSpec as $id){
                        $where = array(
                            'status !='	=>	3,
                            'id'        =>  $id,
                            'product_id'=>  $productId
                        );
                        $check = $this->Master_db->getRecords('product_category_items',$where,'id');
                        if( count($check) == 0 ){
                            clientErr($this,array('message'=>'Product specification not found!!!'));
                        }
                    }
                }

                foreach($category as $row){

                    $categoryName = trim(htmlspecialchars($row['categoryName']));
                    $categoryId = trim(htmlspecialchars($row['categoryId']));

                    //echo "categoryId : ".$categoryId."<br>";
                    if( !empty($row['categoryId']) ){
                        $insertCategory = array(
                            'label'         =>  $categoryName,
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        );
                        $this->Master_db->updateRecord('product_category',$insertCategory,array('id'=>$row['categoryId']));
                    }else{
                        $insertCategory = array(
                            'product_id'    =>  $productId,
                            'label'         =>  $categoryName,
                            'status'        =>  1,
                            'created_at'    =>  date('Y-m-d H:i:s'),
                            'created_by'    =>  0,
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        );
                        $categoryId = $this->Master_db->insertRecord('product_category',$insertCategory);
                    }

                    if( $categoryId ){                            
                        $specData = $row['specData'];
                        foreach($specData as $spec){
                            $specId = trim(htmlspecialchars($spec['specId']));
                            $specStatus = trim(htmlspecialchars($spec['specStatus']));
                            $specName = trim(htmlspecialchars($spec['specName']));
                            $specDesc = trim(htmlspecialchars($spec['specDesc']));
                            
                            if( !empty($spec['specId']) ){
                                $updateSpec = array(
                                    'label'         =>  $specName,
                                    'description'   =>  $specDesc,
                                    'publish'       =>  $specStatus,
                                    'updated_by'    =>  0,
                                    'updated_at'    =>  date('Y-m-d H:i:s'),
                                );
                                $this->Master_db->updateRecord('product_category_items',$updateSpec,array('id'=>$specId));

                            }else{
                                $insertSpec = array(
                                    'product_id'    =>  $productId,
                                    'product_cat_id'=>  $categoryId,
                                    'label'         =>  $specName,
                                    'description'   =>  $specDesc,
                                    'publish'       =>  $specStatus,
                                    'status'        =>  1,
                                    'created_at'    =>  date('Y-m-d H:i:s'),
                                    'created_by'    =>  0,
                                    'updated_by'    =>  0,
                                    'updated_at'    =>  date('Y-m-d H:i:s'),
                                );
                                $this->Master_db->insertRecord('product_category_items',$insertSpec);
                            }
                        }
                    }

                }

                //echo '<pre>';print_r($removeCategory);print_r($removedSpec);exit;
                if( count($removeCategory) ){
                    foreach($removeCategory as $id){
                        $update = array(
                            'id'            =>  $id,
                            'status'        =>  3,
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        );
                        $this->Master_db->updateRecord('product_category',$update,array('id'=>$id));
                    }
                }

                if( count($removedSpec) ){
                    foreach($removedSpec as $id){
                        $update = array(
                            'id'            =>  $id,
                            'status'        =>  3,
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        );
                        $this->Master_db->updateRecord('product_category_items',$update,array('id'=>$id));
                    }
                }

                if( !empty($_POST['productStage']) ){
                    $productStage = trim(htmlspecialchars($this->input->post('productStage')));
                    
                    if( $productStage == 2 ){
                        $update = array();
                        $update['draft'] = 2;
                        $update['publish'] = 1;
                        $this->Master_db->updateRecord('product',$update,array('id'=>$productId));
                    }
                    
                }

                //echo '<pre>';print_r($_POST);exit;
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function productList_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;

            $data = array();
            if( !empty($_GET['type']) ){
                $type = trim(htmlspecialchars($this->input->get('type')));
                $data['category'] = $this->Master_db->getCategoryItemCount($type);

                $catId = $subcatId = 0;
                if( !empty($_GET['catId']) ){ $catId = trim(htmlspecialchars($this->input->get('catId'))); }
                if( !empty($_GET['subcatId']) ){ $subcatId = trim(htmlspecialchars($this->input->get('subcatId'))); }

                $data['items'] = $this->Master_db->getProductsList($type,$catId,$subcatId);
                success($this,array('message'=>'','data'=>$data));
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
            // $data = $this->Master_db->getActiveProducts();
            // echo '<pre>';print_r($data);exit;
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function productRequest_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_POST['productId']) && !empty($_POST['status']) ){
                $productId = trim(htmlspecialchars($this->input->post('productId')));
                $status = trim(htmlspecialchars($this->input->post('status')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $productId,
                    //'request'   =>  1,
                );
                $check = $this->Master_db->getRecords('product',$where,'id,request');
                //echo $this->db->last_query();exit;
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product not found !!!'));
                }else if( $check[0]->request == 2 ){
                    clientErr($this,array('message'=>'Request is approved already!!!'));
                }else if( $check[0]->request == 3 ){
                    clientErr($this,array('message'=>'Reject is rejected already!!!'));
                }else if( $check[0]->request == 1 ){
                    $update = [
                        'request'       =>  $status,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];

                    if( $status == 2 ){
                        $update['draft'] = 1;
                    }
                    $this->Master_db->updateRecord('product',$update,array('id'=>$productId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function productDelete_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_POST['productId']) ){
                $productId = trim(htmlspecialchars($this->input->post('productId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $productId,
                );
                $check = $this->Master_db->getRecords('product',$where,'id,request');
                //echo $this->db->last_query();exit;
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product not found !!!'));
                }else {
                    $update = [
                        'status'        =>  3,
                        'updated_by'    =>  0,
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
                    $this->Master_db->updateRecord('product',$update,array('id'=>$productId));
                    success($this,['message'=>'Saved successfully']);
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function product_specs_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_GET['productId']) ){
                $productId = trim(htmlspecialchars($this->input->get('productId')));

                $where = array('product_id'=>$productId,'status != '=>3);
                $category = $this->Master_db->getRecords('product_category',$where,'id,label','id asc');

                $data = array();
                foreach($category as $row){
                    $where = array('product_id'=>$productId,'product_cat_id'=>$row->id,'status != '=>3);
                    $items = $this->Master_db->getRecords('product_category_items',$where,'id,label,description','id asc');
                    $data[] = array(
                        "id"=>$row->id,
                        "category"=>$row->label,
                        "items"=>$items
                    );
                }
                success($this,['message'=>'Products','data'=>$data]);	
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function product_specs_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['productId']) && !empty($_GET['specId']) ){
                $productId = trim(htmlspecialchars($this->input->get('productId')));
                $specId = trim(htmlspecialchars($this->input->get('specId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $productId
                );
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product not found!!!'));
                }

                $where = array(
                    'status !='	=>	3,
                    'product_id'=>  $productId,
                    'id'        =>  $specId
                );
                $check = $this->Master_db->getRecords('product_category',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Specification not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('product_category',$update,$where);
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function product_specs_items_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            if( !empty($_POST['productId']) && !empty($_POST['catId']) && !empty($_POST['items']) ){
                $productId = trim(htmlspecialchars($this->input->post('productId')));
                $catId = trim(htmlspecialchars($this->input->post('catId')));
                $items = $this->input->post('items');

                foreach($items as $row){

                    if( empty($row['label']) || empty($row['description']) || empty($row['status']) ){
                        clientErr($this,array('message'=>'Required fields are missing!!!'));
                    }

                    if( !empty($row['label']) && !empty($row['description']) && !empty($row['status']) && isset($row['id']) && empty($row['id']) ){
                        $where = array('id'=>$row['id'],'product_id'=>$productId,'product_cat_id'=>$catId,'status != '=>3);
                        $check = $this->Master_db->getRecords('product_category_items',$where,'id');
                        if( count($check) == 0 ){
                            clientErr($this,array('message'=>'Category item not found!!!'));
                        }                        
                    }
                }    

                //echo '<pre>';print_r($_POST);exit;

                foreach($items as $row){
                    if( isset($row['id']) && !empty($row['id']) ){
                        $id = trim(htmlspecialchars($row['id']));
                        $update = [
                            'label'         =>  trim($row['label']),
                            'description'   =>  trim($row['description']),
                            'status'        =>  trim($row['status']),
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        ];
                        $this->Master_db->updateRecord('product_category_items',$update,array('id'=>$row['id']));
                    }else {
                        $insert = [
                            'product_id'    =>  $productId,
                            'product_cat_id'=>  $catId,
                            'label'         =>  trim($row['label']),
                            'description'   =>  trim($row['description']),
                            'status'        =>  trim($row['status']),
                            'created_at'    =>  date('Y-m-d H:i:s'),
                            'created_by'    =>  0,
                            'updated_by'    =>  0,
                            'updated_at'    =>  date('Y-m-d H:i:s'),
                        ];
                        $this->Master_db->insertRecord('product_category_items',$insert);
                    }
                }
                //echo '<pre>';print_r($category);exit;
                success($this,['message'=>'Saved successfully']);                    
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function product_specs_items_delete(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_GET);exit;
            if( !empty($_GET['itemId']) ){
                $itemId = trim(htmlspecialchars($this->input->get('itemId')));

                $where = array(
                    'status !='	=>	3,
                    'id'        =>  $itemId
                );
                $check = $this->Master_db->getRecords('product_category_items',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'Product specification not found!!!'));
                }

                $update = [
                    'status'        =>  3,
                    'updated_by'    =>  0,
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                ];
                $this->Master_db->updateRecord('product_category_items',$update,$where);
                success($this,['message'=>'Saved successfully']);
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function productData_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $data = array(
                'general'   =>  array(),
                'specs'     =>  array(),
                'images'    =>  array(),
            );

            if( !empty($_GET['productId']) ){
                $productId = trim(htmlspecialchars($this->input->get('productId')));

                $where = array('id'=>$productId,'status != '=>3);
                $check = $this->Master_db->getRecords('product',$where,'id');
                if( count($check) == 0 ){
                    clientErr($this,array('message'=>'product not found!!!'));
                }else{
                    $condition = array(
                        'p.id'  =>  $productId
                    );
                    $data['general'] = $this->Master_db->getProducts(0,$condition);
                    $data['specs'] = $this->Master_db->getProductSpecification($productId);

                    $where = array('product_id'=>$productId,'status != '=>3);
                    $data['images'] = $this->Master_db->getRecords('product_files',$where,'id,type,path,status,mime_type,size','id asc');
                    success($this,array('message'=>'Success','data'=>$data));
                }
                
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
            // $data = $this->Master_db->getActiveProducts();
            // echo '<pre>';print_r($data);exit;
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function productTableList_post(){

        //tokenErr($this,array('message'=>'Unauthorized access'));
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            $result = [];
            $data = $this->Master_db->getProductList($this->input->post(),1);

            $i = $_POST["start"]+1;
            foreach($data as $row){
                $tmp_row = array();
                $tmp_row[] = $i++;
                $tmp_row[] = $row->catName;
                $tmp_row[] = $row->subcatName;
                $tmp_row[] = $row->brandName;
                $tmp_row[] = $row->product_name;
                $tmp_row[] = $row->product_code;

                $status = '';
                $action = '';
                //$action = '<button type="button" onclick="itemStatus('.$row->id.',2)" class="btn waves-effect waves-light btn-sm btn-secondary"><i class="far fa-stop-circle"></i></button>';
                if( $row->request == 1 ){
                    $status = '<span class="badge badge-warning">Request</span>';
                }else if( $row->draft == 1 ){
                    $status = '<span class="badge badge-info">In Draft</span>';
                }else if( $row->publish == 1 ){
                    $status = '<span class="badge badge-success">Active</span>';
                }

                $tmp_row[] = $status;
                $action .= '<div class="d-flex"><button type="button" onclick="editProduct('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-warning"><i class="fas fa-edit"></i></button>';
                $action .= '&nbsp;<button type="button" onclick="deleteProduct('.$row->id.')" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></div>';
                $tmp_row[] = $action;

                $result[] = $tmp_row;
            }

            $res    = $this->Master_db->getProductList($this->input->post(),2);
            $total  = count($res);
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  count($res),
                "recordsFiltered"   =>  count($res),
                "data"              =>  $result
            );			
            echo json_encode($output);exit;
        }else{
			tokenErr($this,array('message'=>'Unauthorized access'));
		}
        

    }

    /** File upload */
    public function uploadFile_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){

            //echo '<pre>';print_r($_FILES);exit;
            if( !empty($_FILES['file']) && !empty($_POST['type']) ){

                $type = trim(htmlspecialchars($this->input->post('type')));

                $this->load->library('s3');
                $sharedConfig = [
                    //'profile' => 'default',
                    'region' => $this->config->item('aws_region'),
                    'version' => $this->config->item('aws_version'),
                    'credentials' => array(
                        'key'    => $this->config->item('aws_access_key'),
                        'secret' => $this->config->item('aws_secret_key')
                    )
                ];

                //$result = $this->s3->getObjectsList($sharedConfig,$this->config->item('aws_bucket'),$this->config->item('aws_path'));

                $filename = $this->config->item('aws_path').$_FILES['file']['name'];
                $result = $this->s3->uploadObject($sharedConfig,$this->config->item('aws_bucket'),$filename,$_FILES['file']['tmp_name']);
                echo '<pre>';print_r($result);exit;

                // $filename = $this->config->item('aws_path').$_FILES['file']['name'];
                // if ( $this->s3->uploadObject($sharedConfig,$this->config->item('aws_bucket'),$filename,$_FILES['file']['tmp_name']) ){
                //     $filePath = $this->config->item('aws_url').$this->config->item('aws_path').$_FILES['file']['name'];
                //     //echo $filePath;exit;
                //     $insertFile = array(
                //         'type'  =>  $type,
                //         'path'  =>  $filePath,
                //         'status'=>  1
                //     );
                //     $file_id = $this->Master_db->insertRecord('temp_files',$insertFile);
                //     success($this,['message'=>'File upload successfully','path'=>$filePath,'file_id'=>$file_id]);	
                // }else{
                //     clientErr($this,array('message'=>'Failed to upload!!!'));
                // }

            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }

        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
    }

    /** Profile password */
    public function passwordChange_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_POST);exit;
            if( !empty($_POST['password']) && !empty($_POST['cpassword']) ){
                $password = trim(htmlspecialchars($this->input->post('password')));
                $cpassword = trim(htmlspecialchars($this->input->post('cpassword')));

                if( $password != $cpassword ){
                    clientErr($this,array('message'=>'Password mismatch !!!'));
                }else{
                    $userData = tokenData($this->input->request_headers()['Authorization']);
                    //echo '<pre>';print_r($userData);exit;
                    $where = array(
                        'id'            =>  $userData->user_id,
                        'access_token'  =>  $this->input->request_headers()['Authorization'],
                    );
                    $checkToken = $this->Master_db->getRecords('users',$where,'id');
                    if( count($checkToken) ){
                        $password = hashPassword($password);
                        $update = array(
                            'password'  =>  $password,
                            'updated_at'=>  date('Y-m-d H:i:s'),
                            'updated_by'=>  0
                        );
                        $this->Master_db->updateRecord('users',$update,array('id'=>$userData->user_id));
                        success($this,['message'=>'Password changed successfully']);
                    }else{
                        clientErr($this,array('message'=>'Invalid token !!!'));
                    }
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    /** Account details */
    public function accountDetails_get(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_POST);exit;

            $userData = tokenData($this->input->request_headers()['Authorization']);
            //echo '<pre>';print_r($userData);exit;

            $where = array(
                'id'            =>  $userData->user_id,
                'access_token'  =>  $this->input->request_headers()['Authorization'],
            );
            $checkuser = $this->Master_db->getRecords('users',$where,'*');
            if( count($checkuser) ){
                success($this,['message'=>'Success','data'=>$checkuser[0]]);
            }else{
                clientErr($this,array('message'=>'Invalid token !!!'));
            }
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}

    public function accountDetails_post(){
        if( checkAuthorization($this->input->request_headers()) == 1 ){
            //echo '<pre>';print_r($_POST);exit;

            if( !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])
                && !empty($_POST['phone_no']) ){
                $first_name = trim(htmlspecialchars($this->input->post('first_name')));
                $last_name = trim(htmlspecialchars($this->input->post('last_name')));
                $email = trim(htmlspecialchars($this->input->post('email')));
                $phone_no = trim(htmlspecialchars($this->input->post('phone_no')));
                
                $userData = tokenData($this->input->request_headers()['Authorization']);
                //echo '<pre>';print_r($userData);exit;

                $where = array(
                    'id'            =>  $userData->user_id,
                    'access_token'  =>  $this->input->request_headers()['Authorization'],
                );
                $checkuser = $this->Master_db->getRecords('users',$where,'*');
                if( count($checkuser) ){
                    $update = array(
                        'first_name'=>  $first_name,
                        'last_name' =>  $last_name,
                        'email'     =>  $email,
                        'phone_no'  =>  $phone_no,
                        'updated_at'=>  date('Y-m-d H:i:s'),
                        'updated_by'=>  0
                    );
                    $this->Master_db->updateRecord('users',$update,array('id'=>$userData->user_id));
                    success($this,['message'=>'Saved successfully']);
                }else{
                    clientErr($this,array('message'=>'Invalid token !!!'));
                }
            }else{
                clientErr($this,array('message'=>'Required fields are missing!!!'));
            }
            
        }else{
            tokenErr($this,array('message'=>'Unauthorized access'));
        }
	}
    

}
