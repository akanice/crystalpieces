		<div class="content-wrapper-template main-page cart_info">
			<div class="page-section product-shop-page mb-shop">
			
				<section class="breadcrumbs">
					<div class="container">
						<div class="bc-content">
							<a href="<?=base_url()?>">Home</a><span class="slash-divider">/</span>
							<span class="bread-current">Cart</span>
						</div>
					</div>
				</section>
				
				<link href="<?=base_url('assets/css/product.css')?>" rel="stylesheet">
		
				<section class="cart-inner">
					<div class="container">
						<div class="row clearfix">
						<?php if($total_items > 0) { ?>
							<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12 cart-form">
								<form class="form-order form-horizontal" method="POST" action="<?php echo base_url('cart/update'); ?>">
									<div class="cart-total">
										<div class="inner">
											<?php
												$total_amount = 0;
												foreach($carts as $row) {
												$total_amount = $total_amount + $row['subtotal'];
											?>
											<div class="row clearfix product-row">
												<div class="col-sm-2 col-6 col-order1"><img src="<?=@base_url($row['thumb']); ?>" class="img-holder"></div>
												<div class="col-sm-4 col-6 col col-order2">
													<h4 class="name"><?=@$row['name'];?> </h4>
													<div class="extra-des">
														<?=@$row['extra_des'];?>
													</div>
												</div>
												<div class="col-sm-3 col-6 d-flex flex-row col-order-3">
													<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
														<input class="vertical-quantity form-control input-number" type="text" size="1" id="qty_<?php echo $row['id']; ?>" name="item_qty<?php  echo $row['id']; ?>" value="<?php echo $row['qty']; ?>"  min="0" max="1000"/>
														<span class="input-group-btn-vertical">
															<button class="btn btn-outline bootstrap-touchspin-up icon-up-dir btn-number" type="button" data-type="plus" data-field="item_qty<?php  echo $row['id']; ?>"><i class="fa fa-angle-up"></i></button>
															<button class="btn btn-outline bootstrap-touchspin-down icon-down-dir btn-number" type="button" data-type="minus" data-field="item_qty<?php  echo $row['id']; ?>"><i class="fa fa-angle-down"></i></button>
														</span>
													</div>

												</div>
												<div class="col-sm-1 col-6 col-order-4"><span class="price text-warning">$<?=number_format($row['price'], 0, '.', ',');?></span><br>/unit</div>
												<div class="col-sm-2 col-6 pull-right col-order-5 text-right"><span class="price">$ <?php $subtotal=$row['price']*$row['qty'];echo number_format($subtotal, 0, '.', ',');?></span><br>Subtotal</div>
												
											</div>
											<?php } ?>
											<div class="row clearfix row-total-price">
												<div class="col-sm-9 col-6 col"></div>
												<div class="col-sm-3 col-6 col pull-right text-right"><h5 class="d-inline total name align-right">Total: </h5> <span class="total-price price">$ <?=number_format($total_amount, 0, '.', ',');?></span></div>
												<div class="col-12 pull-right text-right pt-2 pb-2">
													<div class="d-inline-block"><button type="submit" class="btn btn-cp btn-update-cart" id="btn_update_cart">Update Cart</button></div>
												</div>
											</div>
											<div class="row clearfix row-total-price row-action">
												<div class="col-12 text-center">
													<a class="text-primary" href="<?=base_url('shop')?>">Continue Shopping</a>
													<b>Or</b> 
													<a class="btn-checkout" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
														Checkout now?
													</a>
												</div>
												<div class="col-12 text-center">
													
												</div>
											</div>
										</div>
									</div>
								</form>
									
								<div class="collapse" id="collapseExample">	
									<form class="form-order form-horizontal" method="POST" action="<?= base_url('paypal/create_payment_with_paypal') ?>">
										<div class="row clearfix">
											<div class="col-md-12">
												<div class="content">
													<h3 class="page-title">Order Information: </h3>
													
														<div class="form-row">
															<div class="form-group col-sm-6">
																<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Full name*">
															</div>
															<div class="form-group col-sm-6">
																<input type="text" class="form-control col" id="f_email" name="f_email" placeholder="Your Email*">
															</div>
															<div class="form-group col-sm-12">
																<input type="text" class="form-control col" id="f_phone" name="f_phone" placeholder="Phone*">
															</div>
															<div class="form-group col-sm-12">
																<input type="text" class="form-control col" id="item_address" name="item_address" placeholder="Street address *">
															</div>
															<div class="form-group col-sm-12">
																<input type="text" class="form-control col" id="ship_city" name="ship_city" placeholder="Town / City *">
															</div>
															<div class="form-group col-sm-12">
																<input type="text" class="form-control col" id="ship_state" name="ship_state" placeholder="State">
															</div>
															<div class="form-group col-sm-12">
																<input type="text" class="form-control col" id="ship_postal_code" name="ship_postal_code" placeholder="Postcode / ZIP *">
															</div>
															<div class="form-group col-sm-12">
																<select name="ship_billing_country" id="ship_billing_country" class="country_to_state country_select form-control">
                                                                    <option value="">Select a country&hellip;</option>
                                                                    <option value="AX">&#197;land Islands</option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AQ">Antarctica</option>
                                                                    <option value="AG">Antigua and Barbuda</option>
                                                                    <option value="AR">Argentina</option>
                                                                    <option value="AM">Armenia</option>
                                                                    <option value="AW">Aruba</option>
                                                                    <option value="AU">Australia</option>
                                                                    <option value="AT">Austria</option>
                                                                    <option value="AZ">Azerbaijan</option>
                                                                    <option value="BS">Bahamas</option>
                                                                    <option value="BH">Bahrain</option>
                                                                    <option value="BD">Bangladesh</option>
                                                                    <option value="BB">Barbados</option>
                                                                    <option value="BY">Belarus</option>
                                                                    <option value="PW">Belau</option>
                                                                    <option value="BE">Belgium</option>
                                                                    <option value="BZ">Belize</option>
                                                                    <option value="BJ">Benin</option>
                                                                    <option value="BM">Bermuda</option>
                                                                    <option value="BT">Bhutan</option>
                                                                    <option value="BO">Bolivia</option>
                                                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BV">Bouvet Island</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean Territory</option>
                                                                    <option value="BN">Brunei</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CG">Congo (Brazzaville)</option>
                                                                    <option value="CD">Congo (Kinshasa)</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="HR">Croatia</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CW">Cura&ccedil;ao</option>
                                                                    <option value="CY">Cyprus</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands</option>
                                                                    <option value="FO">Faroe Islands</option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="GF">French Guiana</option>
                                                                    <option value="PF">French Polynesia</option>
                                                                    <option value="TF">French Southern Territories</option>
                                                                    <option value="GA">Gabon</option>
                                                                    <option value="GM">Gambia</option>
                                                                    <option value="GE">Georgia</option>
                                                                    <option value="DE">Germany</option>
                                                                    <option value="GH">Ghana</option>
                                                                    <option value="GI">Gibraltar</option>
                                                                    <option value="GR">Greece</option>
                                                                    <option value="GL">Greenland</option>
                                                                    <option value="GD">Grenada</option>
                                                                    <option value="GP">Guadeloupe</option>
                                                                    <option value="GU">Guam</option>
                                                                    <option value="GT">Guatemala</option>
                                                                    <option value="GG">Guernsey</option>
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="GY">Guyana</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran</option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IE">Ireland</option>
                                                                    <option value="IM">Isle of Man</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="CI">Ivory Coast</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JE">Jersey</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Laos</option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macao</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="YT">Mayotte</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia</option>
                                                                    <option value="MD">Moldova</option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="ME">Montenegro</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="NC">New Caledonia</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="KP">North Korea</option>
                                                                    <option value="MK">North Macedonia</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PS">Palestinian Territory</option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PN">Pitcairn</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RE">Reunion</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russia</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                                                    <option value="SH">Saint Helena</option>
                                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                                    <option value="LC">Saint Lucia</option>
                                                                    <option value="SX">Saint Martin (Dutch part)</option>
                                                                    <option value="MF">Saint Martin (French part)</option>
                                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="RS">Serbia</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SK">Slovakia</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                                                    <option value="KR">South Korea</option>
                                                                    <option value="SS">South Sudan</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syria</option>
                                                                    <option value="TW">Taiwan</option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania</option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TL">Timor-Leste</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago</option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates</option>
                                                                    <option value="GB">United Kingdom (UK)</option>
                                                                    <option value="US">United States (US)</option>
                                                                    <option value="UM">United States (US) Minor Outlying Islands</option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VA">Vatican</option>
                                                                    <option value="VE">Venezuela</option>
                                                                    <option value="VN">Vietnam</option>
                                                                    <option value="VG">Virgin Islands (British)</option>
                                                                    <option value="VI">Virgin Islands (US)</option>
                                                                    <option value="WF">Wallis and Futuna</option>
                                                                    <option value="EH">Western Sahara</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>
															</div>
														</div>
														<div class="form-group">
															<textarea class="form-control" id="f_note" name="f_note" placeholder="Note:" rows="5"></textarea>
														</div>
														<?php
															$n=0;$total_amount = 0;
															foreach($carts as $key=>$row) {
															$total_amount = $total_amount + $row['subtotal'];
														?>
														<input title="payment_type" name="payment_type" type="hidden" value="paypal" readonly>
														<input title="item_name" name="item[<?=$n?>][name]" type="hidden" value="<?=@$row['name'];?>" readonly>
														<input title="item_number" name="item[<?=$n?>][number]" type="hidden" value="<?=@$row['id'];?>" readonly>
														<input title="item_description" name="item[<?=$n?>][description]" type="hidden" value="<?=@$row['extra_des'];?>" readonly>
														<input title="item_tax" name="item_tax" type="hidden" value="0" readonly>
														<input title="item_price" name="item[<?=$n?>][price]" type="hidden" value="<?=@$row['price'];?>" readonly>
														<input title="item_quantity" name="item[<?=$n?>][qty]" type="hidden" value="<?=@$row['qty'];?>" readonly>
														<input title="details_tax" name="details_tax" type="hidden" value="0" readonly>
														<input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=@$total_amount;?>" readonly>
														<?php $n++;} ?>
														<button type="submit" name="submit" class="btn-order" id="btn_complete_order">
															<span>
																<i class="fab fa-paypal"></i>  Paynow with Paypal
															</span>
														</button>
														<small class="form-text text-muted text-center"></small>
													
												</div>
											</div>
											<div class="col-md-6">
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<?php } else { ?>
							<div class="col-sm-12">
								<h4 class = "text-success">Không có sản phẩm nào trong giỏ hàng</h4>
							</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<?php if($this->session->flashdata('notif_msg')) :?>
			 <div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<p class="text-center"><?php   echo $this->session->flashdata('notif_msg'); ?></p>
						</div>
					</div>
				</div>
			</div>
			<script>
			   $(document).ready(function(){
					$("#modal_message").modal('show');
			   });
			</script>	
		<?php endif;   ?>

<script type="text/javascript">
	$(document).ready(function () {
		// var 
	});
</script>