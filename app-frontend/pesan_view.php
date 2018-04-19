<div class="row page-content" style="padding: 20px 20%">
    <h1>Pemesanan Suku Cadang</h1>
    <?=form_open('/home/sendPesanan?id_sukucadang=' . $_GET['id_sukucadang']);?>
    <?php
            $error = $this->session->flashdata('error');
            if(isset($error)){
        ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
        <?php } ?>
        <div class="form-group">
            <label>Nama Barang<span style="color:red">*</span>:</label><br>
            <?=$this->sukucadang_model->getSukucadangByID($this->input->get('id_sukucadang'))->nama_barang;?>
        </div>
        <div class="form-group">
            <label>Jumlah Pesanan<span style="color:red">*</span>:</label><br>
            <select name="jumlah" class="form-control">
              <?php for ($stok = 1; $stok <= $this->sukucadang_model->getSukucadangByID($this->input->get('id_sukucadang'))->stok; $stok++): ?>
                  <option><?=$stok;?></option>
              <?php endfor;?>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Pemesan<span style="color:red">*</span>:</label><br>
            <input type="text" class="form-control" name="nama_pemesan" value="">
        </div>

        <div class="form-group">
            <label>No HP<span style="color:red">*</span>:</label><br>
            <input type="text" class="form-control" name="no_hp" value="">
        </div>

        <div class="form-group">
            <label>Alamat<span style="color:red">*</span>:</label><br>
            <input type="text" class="form-control" name="alamat" value="">
        </div>

        <div class="form-group">
            <label>Email<span style="color:red">*</span>:</label><br>
            <input type="text" class="form-control" name="email" value="">
        </div>

        <div class="form-group">
            <label>Tanggal Pengambilan<span style="color:red">*</span>:</label><br>
            <select name="tanggal_pengambilan" class="form-control">
              <?php for ($tgl = 0; $tgl <= 14; $tgl++): ?>
                  <option><?php $tanggal = date("Y/m/d"); echo date('Y/m/d', strtotime($tanggal. ' + '. $tgl  .' days'));?></option>
              <?php endfor;?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
  </div>
</div>