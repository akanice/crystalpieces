<?php
    define('F_HOME', 'home/');
?>

		<div class="" id="contents" class="main-page">
		<?php
			$this->load->view(FRONTEND.F_HOME.'slider',$this->data);
			$this->load->view(FRONTEND.F_HOME.'categories');
			// $this->load->view(FRONTEND.F_HOME.'mostviewed');
			// $this->load->view(FRONTEND.F_HOME.'whychooseus');
			$this->load->view(FRONTEND.F_HOME.'productbycat');
			$this->load->view(FRONTEND.F_HOME.'partners');
			// $this->load->view(FRONTEND.F_HOME.'news');
		?>
		</div>