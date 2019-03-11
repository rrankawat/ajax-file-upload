<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->view('welcome_message');
	}

	public function ajax_upload() {

		if(isset($_FILES['userfile']['name'])) {
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('userfile')) {
				echo $this->upload->display_errors();
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
				echo '<img src="'.base_url().'upload/'.$post_image.'" />';
			}
		}
	}

	public function check() {
		echo base_url();
		echo "<br>";
		echo site_url();
	}
}
