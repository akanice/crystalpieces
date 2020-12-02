		
		<?php if (@$home_popup->content && @$home_popup->display == 1) {?>
		<div id="info_popup">
			<?=@$home_popup->content;?>
		</div>
		<style>
		#info_popup {display: none;}
		img.cboxPhoto { width:100% !importatnt; }
		</style>
		<?php } ?>
		
		<!-- Footer -->
				<footer class="footer-home-main" id="footer-com" style="position: relative;">
					<div class="footer-left">
						<div class="footer-left-left">
							<picture>
								<img src="/assets/img/logo_main.png" class="logo_footer">
							</picture>
						</div>
						<div class="footer-left-right" style="background-image: url('/assets/img/footer-pattern-3.1.png')">
						</div>
					</div>
					<div class="footer-right">
						<div class="icon" style="position: relative; z-index: 1;">
							<a class="facebook" href="https://www.facebook.com/CrPKeycapandmore/" target="_blank">
								<i class="fab fa-facebook"></i>
							</a>
							<a class="instagram" href="https://www.instagram.com/crystalpieces.crp" target="_blank">
								<i class="fab fa-instagram"></i>
							</a>
						</div>
						<div class="footer-title-web">CRYSTAL PIECES &#174;</div>
						<div class="commission">Keycaps and more</div>
						<div class="copy-right">© COPYRIGHT 2020 CrystalPieces. All rights reserved.</div>
					</div>
				</footer>
				<!-- End Footer -->
				
            </div>
            <div class="modal fade bootstrap-modal artkey-custom-modal" id="loginRequiredToSubcribeProduct">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-center" style="color: white;">You must login before using this feature.</h4>
                            <div data-dismiss="modal" aria-hidden="true" class="artkey-custom-modal-close-btn">
                                <img src="https://artkeyuniverse.com/images/artkey-universe-icon/ak-icon/close.svg">
                            </div>
                        </div>
                        <div class="modal-body text-center">
                            <a class="btn-yellow" href="#/account" style="color: white;">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="<?=base_url('assets/js/slick.js')?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/script.js')?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=base_url('assets/plugins/owl-carousel/js/owl.carousel.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/script.js')?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {			
			
			setTimeout(function() {
				(function(d, s, id){
					return;
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) {return;}
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/vi_VN/sdk.js";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			}, 3000);
		});
	</script>
	<?=@$global_footer_code;?>