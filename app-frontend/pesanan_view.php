        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Daftar Pesanan</b>
                      </div> 
                      <div class="panel-body">
                     
<?php $no = 1; ?>
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Jumlah</th>
                <th>Tanggal Pengambilan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if($pesanan != ""): ?>
            <?php foreach ($pesanan as $row): ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$row->nama_pemesan;?></td>
                <td><a href="tel:<?=$row->no_hp;?>"><?=$row->no_hp;?></a></td>
                <td><?=$row->alamat;?></td>
                <td><?=$row->email;?></td>
                <td><?=$row->jumlah;?></td>
                <td>
                <?php if(strtotime($row->tanggal_pengambilan) >= time()): ?>
                    <?=$row->tanggal_pengambilan;?>
                <?php else: ?>
                    <s style="color:red"><?=$row->tanggal_pengambilan;?></s>
                <?php endif;?>
                        
                </td>
                <td>
                <?php if(strtotime($row->tanggal_pengambilan) >= time()): ?>
                    <a href="?cetak=<?=$row->id_sukucadang;?>" class="btn btn-primary">Cetak Nota</a>
                <?php endif;?>
                    <a href="?hapus=<?=$row->id_sukucadang;?>" class="btn btn-small btn-danger" onclick="return Tanya();">Hapus Pesanan</a>
                </td>
            </tr>
        <?php
            $no++;
            endforeach;
        ?>
      <?php endif;?>
        </tbody>
    </table>

 </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );

    function Tanya()
    {
        var tanya = confirm("Anda yakin Menghapus ini?");

        if(tanya == true)
            {
                return true;
            }else {
                return false;
            }
    }
</script>