<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('productsmodel');
		$this->load->model('productscategorymodel');
		$this->load->model('productsattachmodel');
		$this->load->model('brandsmodel');
		$this->data['categories'] = $this->productscategorymodel->read(array('parent_id'=>0),array(),false,10);
		$this->data['brands'] = $this->brandsmodel->read(array(),array(),false);
		$this->data['product_sidebar'] = $this->productsmodel->read(array('featured'=>1),array(),false,5);
		$this->data['product_gift_content'] = $this->configsmodel->read(array('term'=>'product','name'=>'gift_content'),array(),true)->value;
    }

    public function index() {
        $this->data['title'] = 'Crystal Pieces - Shop';
		
		$total = count($this->productsmodel->read());
        $per_page = 20;
        list($this->data['page_links'],$start)	= $this->productsmodel->pagination('shop/','',$total,$per_page,2);
        $this->data['page_links'] 					= $this->pagination->create_links();
		$this->data['products'] 						= $this->productsmodel->read(array('type'=>'product'),array(),false,$per_page,$start);
		
        $this->data['temp'] = 'frontend/products/index';
		$this->load->view('frontend/index', $this->data);
    }

   public function viewCat($alias) {
		$this->load->model('configsmodel');
		$this->data['cat_banners'] = $this->configsmodel->read(array(
            'term' => 'product_cat',
            'name' => 'slider'), array(), true)->value;
		$this->data['cat_banners'] = json_decode($this->data['cat_banners'],true);	
		$this->data['category_data'] = $this->productscategorymodel->read(array('alias'=>$alias),array(),true);
		if ($this->data['category_data']) {
			$this->load->model('brandsmodel');
			//$this->data['brands'] = $this->brandsmodel->read(array(),array('name'=>true),false);
			
			//Filter data
			$this->data['brands'] = $this->productsmodel->ElementFilterBrand($this->data['category_data']->id);
			$this->data['made_in'] = $this->productsmodel->ElementFilterMadein($this->data['category_data']->id);
			if ($this->data['category_data']->custom_field && $this->data['category_data']->custom_field != '') {
				$this->data['custom_field'] = json_decode($this->data['category_data']->custom_field);
			}
			
			
			$f_brand = $this->data['f_brand'] = $this->input->get('f_brand');
			$f_country = $this->data['f_country'] = $this->input->get('f_country');
			$f_price = $this->data['f_price'] = $this->input->get('f_price');
			$f_year = $this->data['f_year'] = $this->input->get('f_year');
			$f_p_order = $this->data['f_p_order'] = $this->input->get('f_p_order');
			$f_customfield = $this->data['f_customfield'] = @$this->input->get('f_customfield');
			$f_customdata = $this->data['f_customdata'] = @$this->input->get('f_customdata');
			
			if ($f_customdata && $f_customdata!='') {
				$i=0;
				foreach ($f_customdata as $f) {
					$kd = array_keys($f);
					$vd = array_values($f);
					//$temp = $kd[$i];
					$this->data['v'][$i] = $vd[0];
					$i++;
				}
			}
			
			//$total = count($this->productsmodel->getProductsByCategoryId('',$this->data['category_data']->id,'','','',''));
			$per_page = 20;
			
			if (($this->input->get('f_brand') != '') or ($this->input->get('f_country') != '') or ($this->input->get('f_price') != '') or ($this->input->get('f_year') != '')) {
				$config['suffix'] = '?f_brand='.urlencode($f_brand).'&f_country='.urlencode($this->data['f_country']).'&f_price='.urlencode($this->data['f_price']).'&f_year='.urlencode($this->data['f_year']).'&f_p_order='.urlencode($this->data['f_p_order']);
				$total = count($this->productsmodel->FilterProducts($this->data['category_data']->id,$this->data['f_brand'],$this->data['f_country'],$this->data['f_year'],$this->data['f_price'],$this->data['f_p_order'],$this->data['f_customfield'],$this->data['f_customdata'],'',''));
				
				list($this->data['page_links'],$start) = $this->productsmodel->pagination('danh-muc/'.$this->data['category_data']->alias,$config['suffix'],$total,$per_page,3);
				$this->data['page_links'] = $this->pagination->create_links();
				$this->data['products'] = $this->productsmodel->FilterProducts($this->data['category_data']->id,$this->data['f_brand'],$this->data['f_country'],$this->data['f_year'],$this->data['f_price'],$this->data['f_p_order'],$this->data['f_customfield'],$this->data['f_customdata'],$per_page,$start);
			} else {
				$total = count($this->productsmodel->getProductsByCategoryId('',$this->data['category_data']->id,'','','',''));
				
				list($this->data['page_links'],$start) = $this->productsmodel->pagination('danh-muc/'.$this->data['category_data']->alias,'',$total,$per_page,3);
				$this->data['page_links'] = $this->pagination->create_links();
				$this->data['products'] = $this->productsmodel->getProductsByCategoryId('',$this->data['category_data']->id,'','',$per_page,$start);
			}
			
			$this->data['title'] = $this->data['category_data']->title;
			$this->data['meta_title'] = $this->data['category_data']->meta_title;
			$this->data['meta_description'] = $this->data['category_data']->meta_description;
			$this->data['meta_keywords'] = $this->data['category_data']->meta_keyword;
			$this->data['meta_images'] = $this->data['category_data']->image;
			
			$this->data['temp'] = 'frontend/products/category';
			$this->load->view('frontend/index', $this->data);
		} else {
			redirect(base_url('404_override'));
		}
    }
	
	public function viewProduct($alias) {
		$this->load->model('videosmodel');
		
		if (isset($alias) and ($alias) != '') {
			$this->data['product_data'] = $this->productsmodel->read(array('alias'=>$alias),array(),true);
			$this->data['brand'] = $this->brandsmodel->read(array('id'=>$this->data['product_data']->brand),array(),true);
			$cat_array = json_decode($this->data['product_data']->categoryid);
			
			// Extract categories what post in it 
			$categoryid = json_decode($this->data['product_data']->categoryid);
			foreach ($categoryid as $n => $value) {
				$this->data['category'][$n] = $cat_data = $this->productscategorymodel->read(array('id' => $value), array(), true);
				if ($cat_data->parent_id == null or $cat_data->parent_id == 0) {
					$cat_chosen = $value;
				}
			}
			
			// Load file_attach
			$this->data['file_attach'] = @$this->productsattachmodel->read(array('product_id'=>$this->data['product_data']->id,'attachdata'=>'file_attach'),array(),true)->value;
			$this->data['actual_image'] = @$this->productsattachmodel->read(array('product_id'=>$this->data['product_data']->id,'attachdata'=>'actual_image'),array(),true)->value;
			$this->data['variant'] = $this->productsmodel->read(array('parent_id'=>$this->data['product_data']->id,'type'=>'variant'),array(),false);
			@$video_id = $this->productsattachmodel->read(array('product_id'=>$this->data['product_data']->id,'attachdata'=>'video_attach'),array(),true)->value;
			$this->data['video_attach'] = $this->videosmodel->read(array('id'=>$video_id),array(),true);
			
			// Load related products
			// $this->data['related_products'] = $this->productsmodel->getRelatedProducts($cat_chosen,8,'');
			$this->data['related_products'] = $this->productsmodel->getRelatedProducts2($cat_chosen,$this->data['product_data']->price,8,'');
			
			$this->data['title'] = $this->data['product_data']->title;
			$this->data['meta_title'] = $this->data['product_data']->meta_title;
			$this->data['meta_description'] = $this->data['product_data']->meta_description;
			$this->data['meta_keywords'] = $this->data['product_data']->meta_keywords;
			$this->data['meta_images'] = $this->data['product_data']->image;
			
			$this->data['temp'] = 'frontend/products/view';
			$this->load->view('frontend/index', $this->data);
		} else {
			redirect(base_url('404_override'));
		}
	}
	
	public function product_search() {
		$this->data['name'] = $this->input->get('name');
        $this->data['category'] = $this->input->get('category');
		$total = count($this->productsmodel->getListProducts('product',$this->data['name'],$this->data['category'],"",""));
		// print_r($total);die();
		$config['suffix'] = '';
		if($this->data['name'] != "" || $this->data['category'] != ""){
            $config['suffix'] = '?category='.urlencode($this->data['category']).'&name='.urlencode($this->data['name']);
        }
        $per_page = 16;
        list($this->data['page_links'],$start) = $this->productsmodel->pagination('tim-kiem',$config['suffix'],$total,$per_page,2);
        $this->data['page_links'] = $this->pagination->create_links();
		$this->data['products'] = $this->productsmodel->getListProducts('product',$this->data['name'],$this->data['category'],$per_page,$start);
		
        $this->data['title'] = 'Tìm kiếm: '.$this->data['name'];
		
		$this->data['temp'] = 'frontend/products/search';
		$this->load->view('frontend/index', $this->data);
    }
	
	  public function viewBrands($alias) {
		$this->load->model('configsmodel');
		
		$this->data['brands_data'] = $this->brandsmodel->read(array('alias'=>$alias),array(),true);//print_r($this->data['brands_data']);die();
		if ($this->data['brands_data']) {
			
			//Filter data
			$this->data['brands'] = $this->productsmodel->ElementFilterBrand('');
			$this->data['made_in'] = $this->productsmodel->ElementFilterMadein('');
			
			$f_cat = $this->data['f_cat'] = $this->input->get('f_cat');
			$f_country = $this->data['f_country'] = $this->input->get('f_country');
			$f_price = $this->data['f_price'] = $this->input->get('f_price');
			$f_year = $this->data['f_year'] = $this->input->get('f_year');
			$f_p_order = $this->data['f_p_order'] = $this->input->get('f_p_order');

			$per_page = 20;
			
			if (($this->input->get('f_cat') != '') or ($this->input->get('f_country') != '') or ($this->input->get('f_price') != '') or ($this->input->get('f_year') != '')) {
				$config['suffix'] = '?f_cat='.urlencode($f_cat).'&f_country='.urlencode($this->data['f_country']).'&f_price='.urlencode($this->data['f_price']).'&f_year='.urlencode($this->data['f_year']).'&f_p_order='.urlencode($this->data['f_p_order']);
				$total = count($this->productsmodel->FilterProducts($this->data['f_cat'],$this->data['brands_data']->id,$this->data['f_country'],$this->data['f_year'],$this->data['f_price'],$this->data['f_p_order'],'','','',''));
				
				list($this->data['page_links'],$start) = $this->productsmodel->pagination('danh-muc/'.$this->data['brands_data']->alias,$config['suffix'],$total,$per_page,3);
				$this->data['page_links'] = $this->pagination->create_links();
				$this->data['products'] = $this->productsmodel->FilterProducts($this->data['f_cat'],$this->data['brands_data']->id,$this->data['f_country'],$this->data['f_year'],$this->data['f_price'],$this->data['f_p_order'],'','',$per_page,$start);
			} else {
				$total = count($this->productsmodel->getProductsByBrands('',$this->data['brands_data']->id,'','',''));
				
				list($this->data['page_links'],$start) = $this->productsmodel->pagination('danh-muc/'.$this->data['brands_data']->alias,'',$total,$per_page,3);
				$this->data['page_links'] = $this->pagination->create_links();
				$this->data['products'] = $this->productsmodel->getProductsByBrands('',$this->data['brands_data']->id,'',$per_page,$start);
			}
			
			$this->data['title'] = $this->data['brands_data']->name;
			$this->data['meta_title'] = $this->data['brands_data']->name;
			$this->data['meta_description'] = $this->data['brands_data']->name;
			$this->data['meta_keywords'] = $this->data['brands_data']->name;
			$this->data['meta_images'] = $this->data['brands_data']->image;
			
			$this->data['temp'] = 'frontend/products/brands';
			$this->load->view('frontend/index', $this->data);
		} else {
			redirect(base_url('404_override'));
		}
    }
	
	
	public function homeDisplayProducts() {
		$cat_id	= $this->input->post('cat_id');
        $brand_id		= $this->input->post('brand_id');
		$this->data['products'] =  $this->productsmodel->getProductsByCatIDBrand('',$cat_id,$brand_id,8,'');
		$this->load->view('frontend/products/template_product_slider', $this->data);
	}
}
