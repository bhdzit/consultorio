@extends('layouts.adminlayout')
@section('content')
<section class="content-header">
    <h1>
        Nueva Consulta
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Encuesta</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="card border-primary mb-3 text-center">
        <div class="card-body">


            <input type="name" class="form-control" id="name" placeholder="Buscar" onkeyup="getDoc(this)">

        </div>
    </div>
    <div id="searchDocContainer" class="row mt-5" style="margin-top: 50px;">
    </div>
    <div id="allDocContainer" class="row mt-5" style="margin-top: 50px;">
        @forelse($doctores as $doctor)

        <div class="col-md-4" onclick="document.location='/perfildedoctor'">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{$doctor->nombre." ".$doctor->apPaterno." ".$doctor->apMaterno}}</h3>
                    <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        @empty
        @endforelse
        <!-- /.col -->
    </div>

</section>
@endsection

@section('script')
<script>
    var json = "{{$doctores}}";
    json = json.replaceAll("&quot;", '"');
    json = JSON.parse(json);
    console.log(json);

    function getDoc(e) {
        if (e.value.length > 0) {
            $("#allDocContainer").attr("hidden", true);
            $("#searchDocContainer").html("");
            var htmlcard = ""
            for (team in json) {
                if (json[team].nombre.includes(e.value)) {
                    console.log(json[team].nombre, e.value);

                    htmlcard =
                        '                   <div class="col-md-4" >' +
                        '           <!-- Widget: user widget style 1 -->' +
                        '           <div class="box box-widget widget-user">' +
                        '               <!-- Add the bg color to the header using any of the bg-* classes -->' +
                        '               <div class="widget-user-header bg-aqua-active">' +
                        '                   <h3 class="widget-user-username">{{$doctor->nombre." ".$doctor->apPaterno." ".$doctor->apMaterno}}</h3>' +
                        '                   <h5 class="widget-user-desc">Founder &amp; CEO</h5>' +
                        '               </div>' +
                        '               <div class="widget-user-image">' +
                        '                   <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">' +
                        '               </div>' +
                        '               <div class="box-footer">' +
                        '                   <div class="row">' +
                        '                       <div class="col-sm-4 border-right">' +
                        '                           <div class="description-block">' +
                        '                               <h5 class="description-header">3,200</h5>' +
                        '                               <span class="description-text">SALES</span>' +
                        '                           </div>' +
                        '                           <!-- /.description-block -->' +
                        '                       </div>' +
                        '                       <!-- /.col -->' +
                        '                       <div class="col-sm-4 border-right">' +
                        '                           <div class="description-block">' +
                        '                               <h5 class="description-header">13,000</h5>' +
                        '                               <span class="description-text">FOLLOWERS</span>' +
                        '                           </div>' +
                        '                           <!-- /.description-block -->' +
                        '                       </div>' +
                        '                       <!-- /.col -->' +
                        '                       <div class="col-sm-4">' +
                        '                           <div class="description-block">' +
                        '                               <h5 class="description-header">35</h5>' +
                        '                               <span class="description-text">PRODUCTS</span>' +
                        '                           </div>' +
                        '                           <!-- /.description-block -->' +
                        '                       </div>' +
                        '                       <!-- /.col -->' +
                        '                   </div>' +
                        '                   <!-- /.row -->' +
                        '               </div>' +
                        '           </div>' +
                        '           <!-- /.widget-user -->' +
                        '       </div>';

                    $("#searchDocContainer").append(htmlcard);
                }
            }
            if (htmlcard == "") {
                $("#noTeamText").removeAttr("hidden", true);
            } else {
                $("#noTeamText").attr("hidden", true);
            }
        } else {
            $("#searchDocContainer").html("");
            $("#allDocContainer").removeAttr("hidden", true);
        }
    }
</script>
@endsection