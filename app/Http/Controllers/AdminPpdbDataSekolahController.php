<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminPpdbDataSekolahController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_sekolah";
			$this->limit = "1";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "sekolah";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Jenjang","name"=>"jenjang"];
			$this->col[] = ["label"=>"Npsn","name"=>"npsn"];
			$this->col[] = ["label"=>"Nama Sekolah","name"=>"nama_sekolah"];
			$this->col[] = ["label"=>"Logo","name"=>"logo","image"=>true];
			$this->col[] = ["label"=>"Alamat","name"=>"alamat"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Jenjang','name'=>'jenjang','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'PAUD;SD;SMP;SMA;SMK'];
			$this->form[] = ['label'=>'Npsn','name'=>'npsn','type'=>'number','validation'=>'numeric','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Nama Sekolah','name'=>'nama_sekolah','type'=>'text','validation'=>'required|min:5|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Logo','name'=>'logo','type'=>'upload','validation'=>'image','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Rt','name'=>'rt','type'=>'number','validation'=>'required','width'=>'col-sm-1'];
			$this->form[] = ['label'=>'Rw','name'=>'rw','type'=>'number','validation'=>'required','width'=>'col-sm-1'];
			$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Desa','name'=>'desa','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Kota','name'=>'kota','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Provinsi','name'=>'provinsi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'number','validation'=>'numeric','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Yayasan','name'=>'yayasan','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Sk Pendirian Sekolah','name'=>'sk_pendirian_sekolah','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Tanggal Sk Pendirian','name'=>'tanggal_sk_pendirian','type'=>'date','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Sk Izin Operasional','name'=>'sk_izin_operasional','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Tanggal Sk Izin Operasional','name'=>'tanggal_sk_izin_operasional','type'=>'date','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required','width'=>'col-sm-9','help'=>'Masukan Url Facebook Sekolah (Contoh:https://facebook.com/smkikakartika)','placeholder'=>'Url Facebook Sekolah'];
			$this->form[] = ['label'=>'No Telp','name'=>'no_telp','type'=>'number','validation'=>'required|numeric','width'=>'col-sm-9','help'=>'Masukan Url Instagram Sekolah (Contoh:https://instagram.com/smkikakartika)','placeholder'=>'Url Instagram Sekolah'];
			$this->form[] = ['label'=>'Facebook','name'=>'facebook','type'=>'text','validation'=>'string','width'=>'col-sm-9','help'=>'Masukan Url Twitter Sekolah (Contoh:https://twitter.com/smkikakartika)','placeholder'=>'Url Twitter Sekolah'];
			$this->form[] = ['label'=>'Instagram','name'=>'instagram','type'=>'text','validation'=>'string','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Twitter','name'=>'twitter','type'=>'text','validation'=>'string','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Latitude','name'=>'latitude','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Longitude','name'=>'longitude','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Maps','name'=>'maps','type'=>'googlemaps','width'=>'col-sm-5'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Jenjang','name'=>'jenjang','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'PAUD;SD;SMP;SMA;SMK'];
			//$this->form[] = ['label'=>'Npsn','name'=>'npsn','type'=>'number','validation'=>'numeric','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Nama Sekolah','name'=>'nama_sekolah','type'=>'text','validation'=>'required|min:5|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Logo','name'=>'logo','type'=>'upload','validation'=>'image','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Rt','name'=>'rt','type'=>'number','validation'=>'required|min:2|max:3|string','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Rw','name'=>'rw','type'=>'number','validation'=>'required|min:2|max:3|string','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Desa','name'=>'desa','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Kota','name'=>'kota','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Provinsi','name'=>'provinsi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'number','validation'=>'numeric','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Yayasan','name'=>'yayasan','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Sk Pendirian Sekolah','name'=>'sk_pendirian_sekolah','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Tanggal Sk Pendirian','name'=>'tanggal_sk_pendirian','type'=>'date','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Sk Izin Operasional','name'=>'sk_izin_operasional','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Tanggal Sk Izin Operasional','name'=>'tanggal_sk_izin_operasional','type'=>'date','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required','width'=>'col-sm-9','help'=>'Masukan Url Facebook Sekolah (Contoh:https://facebook.com/smkikakartika)','placeholder'=>'Url Facebook Sekolah'];
			//$this->form[] = ['label'=>'No Telp','name'=>'no_telp','type'=>'number','validation'=>'required|numeric','width'=>'col-sm-9','help'=>'Masukan Url Instagram Sekolah (Contoh:https://instagram.com/smkikakartika)','placeholder'=>'Url Instagram Sekolah'];
			//$this->form[] = ['label'=>'Facebook','name'=>'facebook','type'=>'text','validation'=>'string','width'=>'col-sm-9','help'=>'Masukan Url Twitter Sekolah (Contoh:https://twitter.com/smkikakartika)','placeholder'=>'Url Twitter Sekolah'];
			//$this->form[] = ['label'=>'Instagram','name'=>'instagram','type'=>'text','validation'=>'string','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Twitter','name'=>'twitter','type'=>'text','validation'=>'string','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Latitude','name'=>'latitude','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Longitude','name'=>'longitude','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Maps','name'=>'maps','type'=>'googlemaps','width'=>'col-sm-5'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}