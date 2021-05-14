@extends('layout.adminlayout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Encuestas
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Encuesta</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    
                    <div class="row" style="margin: 16px 16px 0px 16px;"  id="filter-row">
                        <form target=""  method="POST">

                            @csrf
                            <input type="hidden" name="pdf">
                            <input type="hidden" name="filter" id="filterpdf" value="1">
                            <input type="hidden" name="filterTime" id="filterTimepdf">
                            <button style="margin-right: 20px;" type="submit" class="btn btn-primary pull-right"><i class="fas fa-print " aria-hidden="true"></i></button>
                        </form>
                        <form method="POST" id="reportFrom">
                            @csrf
                            <input style="margin-right: 5px;" class="btn btn-primary hidden" type="submit" value="Aplicar">
                            <div class="form-group col-md-3 ">
                                <select name="filter" id="filter" class="form-control">
                                    <option value="1">Promotor</option>
                                    <option value="1">Promotor n</option>

                                </select>
                            </div>
                            <div id="dateDivFilter" class="form-group col-md-3 ">
                                <input type="text" name="filterTime" class="form-control pull-right" id="reservation" value="DEl MES">
                            </div>
                        </form>
                    </div>


                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Promotor</th>
                                <th>Localidad</th>
                                <th>Encuestado</th>
                                <th>PDF</th>
                                <th>Fecha</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<60;$i++) <tr>
                                <th>{{$i}}</th>
                                <td>12345</td>
                                <td>Localidad N</td>
                                <th>Nombre de Encuestado</th>
                                <td class="text-blue"><a>VER PDF...</a></td>
                                <td>dd/mm/aaaa</td>
                                <td>
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-alt"></i>
                                </td>
                                </tr>
                                @endfor
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>
@endsection


@section('script')
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
     //Date range picker
     $('#reservation').daterangepicker();
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection