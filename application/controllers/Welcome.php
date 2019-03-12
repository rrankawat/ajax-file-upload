<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->view('welcome_message');
	}

	public function ajax_upload() {

		if(isset($_FILES['files']['name'])) {

			for($count=0; $count<count($_FILES['files']['name']); $count++) {
				$_FILES['file']['name'] = $_FILES['files']['name'][$count];
				$_FILES['file']['type'] = $_FILES['files']['type'][$count];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$count];
				$_FILES['file']['error'] = $_FILES['files']['error'][$count];
				$_FILES['file']['size'] = $_FILES['files']['size'][$count];

				$new_name = 'IMG'.time();
				$config['file_name'] = $new_name;
				$config['upload_path'] = './assets/upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('file')) {
					echo $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->upload->data('file_name');
					echo '<div class="col-md-3">';
					echo '<img height="200" width="200" src="'.base_url().'assets/upload/'.$post_image.'" />';
					echo '</div>';
				}
			}
		}
	}

	public function check() {
		echo base_url();
		echo "<br>";
		echo site_url();
		echo "<br>";
		echo time();
	}
}
