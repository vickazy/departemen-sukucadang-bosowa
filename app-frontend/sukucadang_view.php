        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Suku Cadang</b>
                        <a href="?tambah" class="btn btn-small btn-primary">Tambah Data</a>
                      </div> 
                      <div class="panel-body">
                     
<?php $no = 1; ?>
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if($sukucadang != ""): ?>
            <?php foreach ($sukucadang as $row): ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$row->nama_barang;?></td>
                <td><?=$row->deskripsi;?></td>
                <td><?=$row->stok;?></td>
                <td>
                    <a href="?show=<?=$row->id_sukucadang;?>" class="btn btn-small btn-default">Lihat Detail</a>

                    <a href="?edit=<?=$row->id_sukucadang;?>" class="btn btn-small btn-primary">Edit</a>


                    <a href="?hapus=<?=$row->id_sukucadang;?>" class="btn btn-small btn-danger" onclick="return Tanya();">Hapus</a>
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