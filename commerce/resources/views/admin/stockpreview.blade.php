<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Stock</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">

                
                <tr>
                    <td width="120px">Nombre stock</td>
                    <td>{{ $nombre_stock }}</td>
                </tr>
                <tr>
                    <td width="120px">Alerte Produit bas</td>
                    <td>{{ $nombre_produit }}</td>
                </tr>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>