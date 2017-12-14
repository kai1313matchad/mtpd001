		<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">Marketing - Approval</h1>
                    </div>                    
                </div>
                <div class="row">
                	<!-- <div class="col-xs-12"> -->
                		<ul class="nav nav-tabs">
                			<li class="active">
                				<a href="#1" data-toggle="tab">Data Approval</a>
                			</li>
                			<li>
                				<a href="#2" data-toggle="tab">Detail Termin</a>
                			</li>
                			<li>
                				<a href="#3" data-toggle="tab">Detail Perijinan</a>
                			</li>
                		</ul>
                		<form class="form-horizontal" id="form_appr" enctype="multipart/form-data">
                			<div class="tab-content">
                				<div class="tab-pane fade in active" id="1">
                					<div class="form-group">
		                            	<div class="col-xs-4 col-xs-offset-3 text-center">
		                                	<h2>Data Approval</h2>
		                                </div>
	                            	</div>
	                            	<!-- <input type="hidden" name="appr_id" value="<?php echo $appr->APPR_ID;?>"> -->
	                            	<input type="hidden" name="appr_id" value="0">
	                            	<input type="hidden" name="user_id" value="1">
	                            	<div class="form-group">
					                    <label class="col-sm-3 control-label">Nomor Approval</label>
					                    <div class="col-sm-1">
	                                        <a id="genbtn" href="javascript:void(0)" onclick="gen_appr()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-plus"></span></a>
	                                    </div>
					                    <div class="col-sm-7">
					                        <!-- <input class="form-control" type="text" name="appr_code" value="<?php echo $appr->APPR_CODE;?>" readonly> -->
					                        <input class="form-control" type="text" name="appr_code" value="" readonly>
					                	</div>
									</div>
	                            	<div class="form-group hid-form">
	                            		<label class="col-sm-3 control-label">Nomor Approval Cabang</label>
	                                    <div class="col-sm-1">
	                                        <a href="javascript:void(0)" onclick="srch_appr()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
	                                    </div>
	                                    <div class="col-sm-7">
	                                        <input class="form-control" type="text" name="appr_brc" readonly>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Nomor PO</label>
	                                    <div class="col-sm-8">
	                                        <input class="form-control" type="text" name="appr_po" placeholder="Nomor PO">
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Tanggal Pembuatan</label>
	                                    <div class="col-sm-8">
	                                    	<div class='input-group date dtp' id='dtp1'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control" name="tgl" placeholder="Tanggal" />
				                            </div>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Awal-Akhir Kontrak</label>
	                                    <div class="col-sm-4">
	                                    	<div class='input-group date dtp' id='dtp2'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control" name="tgl_awal" placeholder="Awal Kontrak" />
				                            </div>
	                                    </div>
	                                    <div class="col-sm-4">
	                                    	<div class='input-group date dtp' id='dtp3'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control" name="tgl_akhir" placeholder="Akhir Kontrak" />
				                            </div>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Free Recovering</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="appr_rec" class="form-control" rows="2" style="resize: vertical;" placeholder="Keterangan Untuk Free Recovering (Cetak/Pasang)"></textarea>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Nama Klien</label>
	                                    <div class="col-sm-1">
	                                        <a href="javascript:void(0)" onclick="srch_cust()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
	                                    </div>
	                                    <div class="col-sm-3">
	                                        <input class="form-control" type="text" name="cust_code" readonly>
	                                        <input type="hidden" name="cust_id" value="">
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <input class="form-control" type="text" name="cust_name" readonly>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Alamat</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="cust_address" class="form-control" rows="2" style="resize: vertical;" readonly></textarea>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">No.Tlp || Fax</label>
	                                    <div class="col-sm-4">
	                                        <input class="form-control" type="text" name="cust_phone" readonly>
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <input class="form-control" type="text" name="cust_fax" readonly>
	                                    </div>
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">Marketing</label>
	                            		<div class="col-sm-1">
			                            	<a href="javascript:void(0)" onclick="srch_mkt()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
			                            </div>
			                            <div class="col-sm-3">
			                                <input class="form-control" type="text" name="sales_code" readonly>
			                            	<input type="hidden" name="sales_id" value="">
			                            </div>
			                            <div class="col-sm-4">
			                                <input class="form-control" type="text" name="sales_name" readonly>
			                            </div>										
	                            	</div>
	                            	<div class="form-group">
	                            		<label class="col-sm-3 control-label">No.Tlp || Email</label>
			                            <div class="col-sm-4">
			                                <input class="form-control" type="text" name="sales_phone" readonly>
			                            </div>
			                            <div class="col-sm-4">
			                                <input class="form-control" type="mail" name="sales_email" readonly>
			                            </div>
	                            	</div>
	                            	<div class="form-group">
	                                    <label class="col-sm-3 control-label">Keterangan Tambahan</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="appr_info" class="form-control" rows="2" style="resize: vertical;" placeholder="Keterangan Tambahan"></textarea>
	                                    </div>
	                                </div>
	                                <!-- <div class="form-group">
                            			<label class="col-sm-3 control-label">Pekerjaan</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="jobdesc" class="form-control" rows="2" style="resize: vertical;"></textarea>
	                                    </div>
                            		</div> -->
                            		<div class="form-group">
                            			<label class="col-sm-3 control-label">Jenis Reklame</label>
                            			<div class="col-sm-1">
			                                <a href="javascript:void(0)" onclick="srch_bb()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
			                            </div>
			                            <div class="col-sm-7">
			                                <input class="form-control" type="text" name="jnsbb" readonly>
			                                <input type="hidden" name="bb_id" value="">
			                            </div>			                            
                            		</div>
                            		<div class="form-group">
                            			<label class="col-sm-3 control-label">Lokasi</label>
                            			<div class="col-sm-1">
			                                <a href="javascript:void(0)" onclick="srch_loc()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
			                            </div>
			                            <div class="col-sm-7">
			                                <input class="form-control" type="text" name="loc_name" readonly>
			                                <input type="hidden" name="loc_id" value="">
			                            </div>			                            
                            		</div>
                            		<div class="form-group">
			                            <label class="col-sm-3 control-label">Alamat</label>
			                            <div class="col-sm-8">
			                                <textarea name="loc_address" class="form-control" rows="2" style="resize: vertical;" readonly></textarea>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Penempatan Reklame</label>
			                            <div class="col-sm-1">
			                                <a href="javascript:void(0)" onclick="srch_plc()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
			                            </div>
			                            <div class="col-sm-7">
			                                <input type="hidden" name="plc_id">
			                                <input class="form-control" type="text" name="plc_name" readonly>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Materi Visual</label>
			                            <div class="col-sm-8">
			                                <input class="form-control" type="text" name="appr_vis" placeholder="Materi Visual">
			                            </div>
			                        </div>
                            		<div class="form-group">
			                            <label class="col-sm-3 control-label">Ukuran P-L-T</label>
			                            <div class="col-sm-2">
			                                <input class="form-control" type="text" name="appr_length" placeholder="panjang">
			                            </div>
			                            <div class="col-sm-2">
			                                <input class="form-control" type="text" name="appr_width" placeholder="lebar">
			                            </div>
			                            <div class="col-sm-2">
			                                <input class="form-control" type="text" name="appr_height" placeholder="tinggi">
			                            </div>			                            
			                            <label class="col-sm-1 control-label">Meter</label>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Luas</label>
			                            <div class="col-sm-2">
			                                <input class="form-control" type="text" name="appr_sumsize" placeholder="luas">
			                            </div>			                            
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Sisi Muka || Jumlah</label>
			                            <div class="col-sm-6">
			                                <input class="form-control" type="text" name="appr_side" placeholder="depan/belakang/samping">
			                            </div>			                            
			                            <div class="col-sm-2">
			                                <input class="form-control" type="text" name="appr_plcsum" placeholder="jumlah">
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Mata Uang || Rate</label>
			                            <div class="col-sm-1">
			                            	<a href="javascript:void(0)" onclick="srch_curr()" class="btn btn-block btn-info"><span class="glyphicon glyphicon-search"></span></a>
			                            </div>
			                            <div class="col-sm-3">
			                            	<input class="form-control" type="text" name="curr_name" readonly>
			                               	<input type="hidden" name="curr_id" value="">
			                            </div>
			                            <div class="col-sm-4">
			                            	<input class="form-control" type="text" name="curr_rate" readonly>
										</div>
			                        </div>
			                        <div class="form-group">
			                        	<label class="col-sm-3 control-label">Detail Biaya</label>
	                                    <div class="col-sm-8">
	                                        <label class="radio-inline"><input type="radio" onclick="show()" name="detail_biaya" value="0">Tampilkan</label>
	                                        <label class="radio-inline"><input type="radio" onclick="hide()" name="detail_biaya" value="1">Sembunyikan</label> 
	                                    </div>
			                        </div>
			                        <div id="det_biaya" class="col-sm-offset-3">
			                        	<div class="form-group">
	                            			<label class="col-sm-3 control-label">Ket Biaya</label>
	                            			<div class="col-sm-7">
	                            				<input class="form-control" type="text" name="cost_code" placeholder="Keterangan Detail Biaya">	                            				
	                            			</div>
	                            		</div>
	                            		<div class="form-group">
	                            			<label class="col-sm-3 control-label">Jumlah Biaya</label>
	                            			<div class="col-sm-7">
	                            				<div class="input-group">
	                            					<span class="input-group-addon curr">Rp</span>
		                            				<input class="form-control" type="text" name="cost_amount" placeholder="Jumlah Biaya">
	                            				</div>
	                            			</div>
	                            		</div>
	                            		<div class="form-group">
	                            			<div class="col-sm-offset-3 col-sm-4">
	                            				<a href="javascript:void(0)" onclick="add_costapp()" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
	                            			</div>
	                            		</div>
	                            		<div class="row">
	                            			<div class="col-sm-11 col-xs-11 table-responsive">
	                            				<table id="dtb_biaya" class="table table-striped table-bordered" cellspacing="0" width="100%">
	                            					<thead>
	                            						<tr>
	                            							<th class="text-center">
							                                    No
							                                </th>
							                                <th class="text-center">
							                                    Deskripsi
							                                </th>
							                                <th class="text-center">
							                                    Jumlah
							                                </th>
							                                <th class="text-center">
							                                    Actions
							                                </th>
	                            						</tr>
	                            					</thead>
	                            				</table>
	                            			</div>
	                            		</div>
			                        </div>
			                        <!-- <div class="form-group">
			                            <label class="col-sm-3 control-label">Pembayaran</label>
			                            <div class="col-sm-8">
			                                <input class="form-control" type="text" name="appr_pay">
			                            </div>
			                        </div> -->
			                        <div class="form-group hid-form">
			                            <label class="col-sm-3 control-label">Nominal Cabang</label>
			                            <div class="col-sm-8">
			                                <input class="form-control" type="text" name="brc_nom" readonly>
			                            </div>
			                        </div>
                            		<div class="form-group">
                            			<label class="col-sm-3 control-label">DPP</label>
			                            <div class="col-sm-8">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control chgcount" type="text" name="dpp" readonly>
			                            	</div>			                                
			                            </div>
                            		</div>
                            		<div class="form-group">
			                            <label class="col-sm-3 control-label">Disc. 1</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                                	<input class="form-control chgcount" type="text" name="discp1" placeholder="Diskon 1">
			                                </div>
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control" type="text" name="discn1" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Disc. 2</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                                	<input class="form-control chgcount" type="text" name="discp2" placeholder="Diskon 2">          	
			                                </div>
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control" type="text" name="discn2" readonly>
			                            	</div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Sub Total</label>
			                            <div class="col-sm-8">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control" type="text" name="subtotal1" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">PPN</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                                	<input class="form-control chgcount" type="text" name="ppnp">             	
			                                </div>
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control" type="text" name="ppnn" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Pajak Reklame</label>
			                            <div class="col-sm-8">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control chgcount" type="text" name="appr_bbtax">
			                            	</div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Sub Total</label>
			                            <div class="col-sm-8">
			                                <input class="form-control" type="text" name="subtotal2" readonly>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">PPH</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                                	<input class="form-control chgcount" type="text" name="pphp" placeholder="PPH">
			                                </div>
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon curr">Rp</span>
			                            		<input class="form-control" type="text" name="pphn" readonly>
			                            	</div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">Grand Total</label>
			                            <div class="col-sm-8">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">Rp</span>
			                            		<input class="form-control" type="text" name="gtotal" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
										<div class="col-sm-offset-3 col-sm-2 text-center">
			                            	<a href="javascript:void(0)" onclick="saveapp()" class="btn btn-block btn-primary btn-default">Simpan</a>
			                            </div>
									</div>
                				</div>
                				<div class="tab-pane fade" id="2">
                					<div class="form-group">
		                            	<div class="col-xs-4 col-xs-offset-3 text-center">
		                                	<h2>Detail Termin</h2>
		                                </div>
	                            	</div>
	                            	<div class="form-group">
                            			<label class="col-sm-3 control-label">Termin</label>
	                                    <div class="col-sm-8">
	                                        <input class="form-control" type="text" name="termcode">
	                                    </div>
                            		</div>
                            		<div class="form-group">
	                                    <label class="col-sm-3 control-label">Keterangan</label>
	                                    <div class="col-sm-8">
	                                        <textarea name="terminfo" class="form-control" rows="2" style="resize: vertical;"></textarea>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                            		<label class="col-sm-3 control-label">Tanggal Bayar</label>
	                                    <div class="col-sm-8">
	                                    	<div class='input-group date dtp' id='dtp1'>     
				                                <span class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </span>
				                                <input id="tgl" type='text' class="form-control" name="tgl_term" placeholder="Tanggal" />
				                            </div>
	                                    </div>
	                            	</div>
	                                <div class="form-group">
                            			<label class="col-sm-3 control-label">DPP Approval</label>
	                                    <div class="col-sm-8">
	                                    	<div class="input-group">
	                                    		<span class="input-group-addon">Rp</span>
	                                    		<input class="form-control termchgcount" type="text" name="dpp_appr" readonly>
	                                    	</div>	                                        
	                                    </div>
                            		</div>
                            		<div class="form-group">
                            			<label class="col-sm-3 control-label">Tagihan</label>
	                                    <div class="col-sm-8">
	                                    	<div class="input-group">
	                                    		<span class="input-group-addon">%</span>
	                                        	<input class="form-control termchgcount" type="text" name="termperc">
	                                        </div>
	                                    </div>
                            		</div>
                            		<div class="form-group">
                            			<label class="col-sm-3 control-label">DPP Termin</label>
	                                    <div class="col-sm-8">
	                                    	<div class="input-group">
	                                    		<span class="input-group-addon">Rp</span>
	                                    		<input class="form-control termchgcount" type="text" name="termdpp" readonly>
	                                    	</div>	                                        
	                                    </div>
                            		</div>                            		
                            		<div class="form-group">
			                            <label class="col-sm-3 control-label">PPN</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                            		<input class="form-control termchgcount" type="text" name="termppnp">
			                            	</div>			                                
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">Rp</span>
			                            		<input class="form-control" type="text" name="termppnn" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
                            			<label class="col-sm-3 control-label">Sub Total</label>
	                                    <div class="col-sm-8">
	                                    	<div class="input-group">
	                                    		<span class="input-group-addon">Rp</span>
	                                    		<input class="form-control termchgcount" type="text" name="termsub" readonly>
	                                    	</div>	                                        
	                                    </div>
                            		</div>
			                        <div class="form-group">
			                            <label class="col-sm-3 control-label">PPH</label>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">%</span>
			                        			<input class="form-control termchgcount" type="text" name="termpphp">
			                            	</div>
			                            </div>
			                            <div class="col-sm-4">
			                            	<div class="input-group">
			                            		<span class="input-group-addon">Rp</span>
			                            		<input class="form-control" type="text" name="termpphn" readonly>
			                            	</div>			                                
			                            </div>
			                        </div>
			                        <div class="form-group">
                            			<label class="col-sm-3 control-label">Total Termin</label>
	                                    <div class="col-sm-8">
	                                    	<div class="input-group">
	                                    		<span class="input-group-addon">Rp</span>
	                                    		<input class="form-control" type="text" name="termsum" readonly>
	                                    	</div>	                                        
	                                    </div>
                            		</div>
			                        <div class="form-group">
                            			<div class="col-sm-offset-3 col-sm-4">
                            				<a href="javascript:void(0)" onclick="add_termapp()" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            			</div>
                            		</div>
                            		<div class="row">
                            			<div class="col-sm-12 col-xs-12 table-responsive">
						                    <table id="dtb_termin" class="table table-striped table-bordered" cellspacing="0" width="100%">
						                        <thead>
						                            <tr>
						                                <th class="text-center">
						                                    No
						                                </th>
						                                <th class="text-center">
						                                    Termin
						                                </th>                              
						                                <th class="text-center">
						                                    Tagihan
						                                </th>
						                                <th class="text-center">
						                                    Nominal
						                                </th>
						                                <th class="text-center">
						                                    DPP
						                                </th>
						                                <th class="text-center">
						                                    PPN
						                                </th>
						                                <th class="text-center">
						                                    PPH
						                                </th>
						                                <th class="text-center">
						                                    Actions
						                                </th>
						                            </tr>                            
						                        </thead>                        
						                    </table>
						                </div>
                            		</div>
                				</div>
                				<div class="tab-pane fade" id="3">
                					<div class="form-group">
		                            	<div class="col-xs-4 col-xs-offset-3 text-center">
		                                	<h2>Detail Perijinan</h2>
		                                </div>
	                            	</div>
	                            	<div class="form-group">
                            			<label class="col-sm-3 control-label">Jenis Ijin</label>
	                                    <div class="col-sm-8">
	                                        <select id="pattyp" name="pat_id" class="form-control" required>
		                                        <option value="">--Pilih--</option>
		                                    <?php
		                                        for($i=0; $i<count($pattyp); $i++)
		                                    { ?>
		                                        <option value="<?php echo $pattyp[$i]->PRMTTYP_ID ; ?>"><?php echo $pattyp[$i]->PRMTTYP_NAME; ?></option>
		                                    <?php
		                                        }
		                                    ?>
		                                    </select>
	                                    </div>
                            		</div>
                            		<div class="form-group">
                            			<div class="col-sm-offset-3 col-sm-4">
                            				<a href="javascript:void(0)" onclick="add_ijinapp()" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            			</div>
                            		</div>
                            		<div class="row">
                            			<div class="col-sm-12 col-xs-12 table-responsive">
						                    <table id="dtb_ijinapp" class="table table-striped table-bordered" cellspacing="0" width="100%">
						                        <thead>
						                            <tr>
						                                <th class="text-center">
						                                    No
						                                </th>
						                                <th class="text-center">
						                                    Kode
						                                </th>
						                                <th class="text-center">
						                                    Nama
						                                </th>                              
						                                <th class="text-center">
						                                    Actions
						                                </th>
						                            </tr>                            
						                        </thead>                        
						                    </table>
						                </div>
                            		</div>
                				</div>
                			</div>
                		</form>
                	<!-- </div> -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- Modal Search -->
    <div class="modal fade" id="modal_cust" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_cust" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>Alamat</th>
	    								<th>Kota</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>    				
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_mkt" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_mkt" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>No.Tlp</th>
	    								<th>Email</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_bb" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_bb" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>Info</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>    				
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_curr" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_curr" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>Rate</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>    				
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_loc" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_loc" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>Alamat</th>
	    								<th>Kota</th>
	    								<th>Info</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>    				
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_plc" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
    			</div>
    			<div class="modal-body">
    				<div class="row">
    					<div class="col-sm-12 col-xs-12 table-responsive">
	    					<table id="dtb_plc" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    						<thead>
	    							<tr>
	    								<th>No</th>
	    								<th>Kode</th>
	    								<th>Nama</th>
	    								<th>Pilih</th>
	    							</tr>
	    						</thead>
	    					</table>
	    				</div>
    				</div>    				
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal fade" id="modal_appr" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_appr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Approval</th>
                                        <th class="col-xs-4">Nama Cabang</th>
                                        <th>Tanggal</th>
                                        <th>Klien</th>
                                        <th>Lokasi</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Search -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.js')?>"></script>
    <!-- Datetime -->
    <script src="<?php echo base_url('assets/addons/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/addons/bootstrap-datetimepicker.min.js')?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.responsive.js')?>"></script>
    <!-- Addon -->
    <script src="<?php echo base_url('assets/addons/extra.js')?>"></script>
    <script>
    	$(document).ready(function()
    	{
    		$('.dtp').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            inputchg();
            inputtermchg();
            var id = $('[name="appr_id"]').val();
            // ijinapp(id);
            termapp(id);
            costapp(id);
    	});

    	function inputchg()
    	{
    		$('.chgcount').on('input', function() {
                hitung_();                
            });
    	}

    	function inputtermchg()
    	{
    		$('.termchgcount').on('input', function() {
    			hitungterm_();
    		});
    	}

    	function gen_appr()
    	{
    		$.ajax({
    			url : "<?php echo site_url('administrator/Marketing/gen_appr')?>",
    			type: "GET",
    			dataType: "JSON",
    			success: function(data)
    			{
    				$('[name="appr_id"]').val(data.id);
    				$('[name="appr_code"]').val(data.kode);
					$('#genbtn').attr('disabled',true);
    				termapp(data.id);
            		costapp(data.id);
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
    				alert('Gagal Ambil Nomor Approval');
    			}
    		});
    	}

    	function saveapp()
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_simpanapp')?>",
	            type: "POST",
	            data: $('#form_appr').serialize(),
	            dataType: "JSON",
	            success: function(data)
	            {
	                if(data.status)
	                {
	                    alert('Data Berhasil Disimpan');	                    
	                }
	                else
	                {
	                	for (var i = 0; i < data.inputerror.length; i++) 
	                    {
	                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
	                    }
	                }
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error adding / update data');
	            }
	        });
    	}

    	function show()
    	{
    		$('#det_biaya').css({'display':'block'});
    	}

    	function hide()
    	{
    		$('#det_biaya').css({'display':'none'});
    	}
    </script>
    <!-- Fungsi Hitung -->
    <script>
    	function hitung_()
    	{
    		var currrate = $('[name="curr_rate"]').val();
    		var dpp = $('[name="dpp"]').val();
    		var discp1 = $('[name="discp1"]').val();
    		var discp2 = $('[name="discp2"]').val();
    		var discn1 = dpp*discp1/100;
    		$('[name="discn1"]').val(discn1);
    		var discn2 = (dpp-discn1)*1*discp2/100;
    		$('[name="discn2"]').val(discn2);
    		var sub1 = (dpp-discn1-discn2)*1;
			$('[name="subtotal1"]').val(sub1);
			var ppnp = $('[name="ppnp"]').val();
			var ppnn = sub1*ppnp/100;
			$('[name="ppnn"]').val(ppnn);
			var bbtax = $('[name="appr_bbtax"]').val();
			var sub2 = (sub1*1)+(ppnn*1)+(bbtax*1);
			$('[name="subtotal2"]').val(sub2);
			var pphp = $('[name="pphp"]').val();
			var pphn = sub2*pphp/100;
			$('[name="pphn"]').val(pphn);			
			var grandtotal = ((sub1*1)+(ppnn*1)+(bbtax*1)-(pphn*1))*currrate;			
			$('[name="gtotal"]').val(grandtotal);
			// $('[name="dpp_appr"]').val(((sub1*1)+(bbtax*1)));
			$('[name="dpp_appr"]').val(sub1);
    	}

    	function hitungterm_()
    	{
    		var dppappr = $('[name="dpp_appr"]').val();
    		var trmp = $('[name="termperc"]').val();
    		var dppterm = dppappr*trmp/100;
    		$('[name="termdpp"]').val(dppterm);
    		var ppnptrm = $('[name="termppnp"]').val();
    		var ppnntrm = dppterm*ppnptrm/100;
    		$('[name="termppnn"]').val(ppnntrm);
    		var sub1 = (dppterm+ppnntrm)*1;
    		$('[name="termsub"]').val(sub1);
    		var pphptrm = $('[name="termpphp"]').val();
    		var pphntrm = sub1*pphptrm/100;
    		$('[name="termpphn"]').val(pphntrm);
    		var sub2 = (sub1+pphntrm)*1;
    		$('[name="termsum"]').val(sub2);
    	}
    </script>
    <!-- Fungsi Tampilan Data Detail -->
    <script>
    	//Detail Biaya
    	function costapp(id)
    	{
	        table = $('#dtb_biaya').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_costapp/')?>"+id,
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function add_costapp()
    	{
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_add_costapp')?>",
	            type: "POST",
	            data: $('#form_appr').serialize(),
	            dataType: "JSON",
	            success: function(data)
	            {
	                if(data.status)
	                {
	                	$('[name="cost_code"]').val('');
	                	$('[name="cost_amount"]').val('');
	                    alert('Data Berhasil Ditambahkan');
	                    id = $('[name="appr_id"]').val();
	                    costapp(id);
	                    get_subcost(id);
	                }
	                else
	                {
	                	for (var i = 0; i < data.inputerror.length; i++) 
	                    {
	                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
	                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
	                    }
	                }	                
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error adding / update data');
	            }
	        });
    	}

    	function del_costapp(id)
    	{
    		if(confirm('Are you sure delete this data?'))
	        {	            
	            $.ajax({
	                url : "<?php echo site_url('administrator/Marketing/ajax_del_costapp/')?>"+id,
	                type: "POST",
	                dataType: "JSON",
	                success: function(data)
	                {
	                    alert('Data Berhasil Dihapus');
	                    id = $('[name="appr_id"]').val();
	                    costapp(id);
	                    get_subcost(id);
	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error deleting data');
	                }
	            });
	        }
    	}

    	function get_subcost(id)
    	{
    		$.ajax({
    			url : "<?php echo site_url('administrator/Marketing/get_subcost/')?>"+id,
    			type : "POST",
    			dataType : "JSON",
    			success : function(data)
    			{
    				if(data.subtotal != null)
    				{
    					$('[name="dpp"]').val(data.subtotal);
    				}
    				else
    				{
    					$('[name="dpp"]').val('0');
    				}
    				hitung_();
    			}
    		});
    	}
    	//Detail Termin
    	function termapp(id)
    	{
	        table = $('#dtb_termin').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_termapp/')?>"+id,
	                "type": "POST",	                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function add_termapp()
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_add_termapp')?>",
	            type: "POST",
	            data: $('#form_appr').serialize(),
	            dataType: "JSON",
	            success: function(data)
	            {
	                if(data.status)
	                {
	                    alert('Data Berhasil Ditambahkan');
	                    id = $('[name="appr_id"]').val();
	                    termapp(id);
	                }	                
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error adding / update data');
	            }
	        });
    	}

    	function del_termapp(id)
    	{
    		if(confirm('Are you sure delete this data?'))
	        {	            
	            $.ajax({
	                url : "<?php echo site_url('administrator/Marketing/ajax_del_termapp')?>/"+id,
	                type: "POST",
	                dataType: "JSON",
	                success: function(data)
	                {
	                    alert('Data Berhasil Dihapus');
	                    id = $('[name="appr_id"]').val();
	                    termapp(id);
	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error deleting data');
	                }
	            });
	        }
    	}
    	//Detail Permit
    	function ijinapp(id)
    	{    		    		
	        table = $('#dtb_ijinapp').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_ijinapp/')?>"+id,
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function add_ijinapp()
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_add_ijinapp')?>",
	            type: "POST",
	            data: $('#form_appr').serialize(),
	            dataType: "JSON",
	            success: function(data)
	            {
	                if(data.status)
	                {
	                    alert('Data Berhasil Ditambahkan');
	                    id = $('[name="appr_id"]').val();
	                    ijinapp(id);
	                }	                
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error adding / update data');
	            }
	        });
    	}

    	function del_ijinapp(id)
    	{
    		if(confirm('Are you sure delete this data?'))
	        {	            
	            $.ajax({
	                url : "<?php echo site_url('administrator/Marketing/ajax_del_ijinapp')?>/"+id,
	                type: "POST",
	                dataType: "JSON",
	                success: function(data)
	                {
	                    alert('Data Berhasil Dihapus');
	                    id = $('[name="appr_id"]').val();
	                    ijinapp(id);
	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error deleting data');
	                }
	            });
	        }
    	}
    </script>
    <!-- Fungsi Search -->
    <script>
    	function srch_appr()
    	{
    		$('#modal_appr').modal('show');
            $('.modal-title').text('Cari Approval');            
            table = $('#dtb_appr').DataTable({
                "info": false,
                "destroy": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "order": [],                
                "ajax": {
                    "url": "<?php echo site_url('administrator/Searchdata/srch_apprbranch')?>",
                    "type": "POST",                
                },                
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],
            });
    	}

    	function srch_cust()
    	{
    		$('#modal_cust').modal('show');
    		$('.modal-title').text('Cari Customer');    		
	        table = $('#dtb_cust').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_cust')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function srch_mkt()
    	{
    		$('#modal_mkt').modal('show');
    		$('.modal-title').text('Cari Marketing');    		
	        table = $('#dtb_mkt').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_mkt')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function srch_bb()
    	{
    		$('#modal_bb').modal('show');
    		$('.modal-title').text('Cari Jenis Reklame');
	        table = $('#dtb_bb').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_bb')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function srch_loc()
    	{
    		$('#modal_loc').modal('show');
    		$('.modal-title').text('Cari Lokasi');    		
	        table = $('#dtb_loc').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_loc')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function srch_plc()
    	{
    		$('#modal_plc').modal('show');
    		$('.modal-title').text('Cari Penempatan');
	        table = $('#dtb_plc').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_plc')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}

    	function srch_curr()
    	{
    		$('#modal_curr').modal('show');
    		$('.modal-title').text('Cari Rate Mata Uang');	    		
	        table = $('#dtb_curr').DataTable({
	            "info": false,
	            "destroy": true,
	            "responsive": true,
	            "processing": true,
	            "serverSide": true,
	            "order": [],	            
	            "ajax": {
	                "url": "<?php echo site_url('administrator/Marketing/ajax_srch_curr')?>",
	                "type": "POST",                
	            },	            
	            "columnDefs": [
	            { 
	                "targets": [ 0 ],
	                "orderable": false,
	            },
	            ],
	        });
    	}
    </script>
    <!-- Fungsi Pick -->
    <script>
    	function pick_cust(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_cust/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="cust_id"]').val(data.CUST_ID);
	                $('[name="cust_code"]').val(data.CUST_CODE);
	                $('[name="cust_name"]').val(data.CUST_NAME);
	                $('[name="cust_address"]').val(data.CUST_ADDRESS+', '+data.CUST_CITY);
	                $('[name="cust_phone"]').val(data.CUST_PHONE);
	                $('[name="cust_fax"]').val(data.CUST_FAX);
	                $('#modal_cust').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}

    	function pick_mkt(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_mkt/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="sales_id"]').val(data.SALES_ID);
	                $('[name="sales_code"]').val(data.SALES_CODE);
	                $('[name="sales_name"]').val(data.PERSON_NAME);                
	                $('[name="sales_phone"]').val(data.SALES_PHONE);
	                $('[name="sales_email"]').val(data.SALES_EMAIL);
	                $('#modal_mkt').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}

    	function pick_bb(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_bb/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="bb_id"]').val(data.BB_ID);	                
	                $('[name="jnsbb"]').val(data.BB_NAME);                	                
	                $('#modal_bb').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}

    	function pick_loc(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_loc/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="loc_id"]').val(data.LOC_ID);
	                $('[name="loc_name"]').val(data.LOC_NAME);
	                $('[name="loc_address"]').val(data.LOC_ADDRESS+', '+data.LOC_CITY);
	                $('#modal_loc').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}

    	function pick_plc(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_plc/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="plc_id"]').val(data.PLC_ID);
	                $('[name="plc_name"]').val(data.PLC_NAME);	                
	                $('#modal_plc').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}

    	function pick_curr(id)
    	{    		
	        $.ajax({
	            url : "<?php echo site_url('administrator/Marketing/ajax_pick_curr/')?>" + id,
	            type: "GET",
	            dataType: "JSON",
	            success: function(data)
	            {   
	                $('[name="curr_id"]').val(data.CURR_ID);
	                $('[name="curr_name"]').val(data.CURR_NAME);
	                $('[name="curr_rate"]').val(data.CURR_RATE);
	                $('.curr').text(data.CURR_SYMBOL);
	                hitung_();
	                $('#modal_curr').modal('hide');
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error get data from ajax');
	            }
	        });
    	}
    </script>
</body>
</html>