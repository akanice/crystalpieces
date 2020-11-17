<?php
    define('F_HOME', 'home/');
?>

		<div class="content-wrapper-template">
			<div id="home-page">
			<?php
				$this->load->view(FRONTEND.F_HOME.'slider',$this->data);
				$this->load->view(FRONTEND.F_HOME.'featuredproducts');
				$this->load->view(FRONTEND.F_HOME.'news');
				$this->load->view(FRONTEND.F_HOME.'socials');
				// $this->load->view(FRONTEND.F_HOME.'news');
			?>
		</div>