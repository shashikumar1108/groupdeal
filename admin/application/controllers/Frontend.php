<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

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
		$this->data = array();
		$this->data['headerContent'] = $this->load->view('admin_views/headerContent',array(),true);
		$this->data['header'] = $this->load->view('admin_views/header',array(),true);
		$this->data['footer'] = $this->load->view('admin_views/footer',array(),true);
		$this->data['leftmenu'] = $this->load->view('admin_views/leftmenu',array(),true);
		$this->data['script'] = $this->load->view('admin_views/script',array(),true);
	}

	public function index(){
        $this->load->view('admin_views/login');
    }

    public function dashboard(){
        $this->load->view('admin_views/dashboard',$this->data);
    }

	public function category(){
        $this->load->view('admin_views/category',$this->data);
    }

	public function subcategory(){
        $this->load->view('admin_views/subcategory',$this->data);
    }

	public function brand(){
        $this->load->view('admin_views/brand',$this->data);
    }

	public function colour(){
        $this->load->view('admin_views/colour',$this->data);
    }
	
	public function product(){
        $this->data['title'] = "Product List";
		$this->load->view('admin_views/productList',$this->data);
    }

	public function product_catalogue(){
        $this->load->view('admin_views/product',$this->data);
    }

	public function productCreate(){
		$this->data['title'] = "Create Product";
		$this->data['product_id'] = '';
		$this->data['action'] = true;
        $this->load->view('admin_views/saveProduct',$this->data);
    }

	public function productEdit(){
		$this->data['title'] = "Edit Product";
		$this->data['product_id'] = '';
		$this->data['action'] = true;
		if( !empty($_GET['productId']) ){
			$this->data['product_id'] = trim(htmlspecialchars($this->input->get('productId')));
		}
        $this->load->view('admin_views/saveProduct',$this->data);
    }

	public function productView(){
		$this->data['title'] = "View Product";
		$this->data['product_id'] = '';
		$this->data['action'] = false;
		if( !empty($_GET['productId']) ){
			$this->data['product_id'] = trim(htmlspecialchars($this->input->get('productId')));
		}
        $this->load->view('admin_views/saveProduct',$this->data);
    }

	public function account(){
        $this->load->view('admin_views/account',$this->data);
    }

	public function view(){
        $this->load->view('admin_views/profileview',$this->data);
    }

}
