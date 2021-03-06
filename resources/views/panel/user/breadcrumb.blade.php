<!-- Content Header (Page header) -->
<div class="content-header">
     <div class="container-fluid">
          <div class="row mb-2">
               <div class="col-sm-6">
                    <h1 class="m-0">{{ $titleBreadCrumb ?? "Sem titulo de BreadCrumb" }} | <a class="btn btn-success" data-toggle="modal" data-target="#create-user"><i
                                   class="fa fa-plus text-white"></i></a></h1>
               </div><!-- /.col -->
               <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href=" {{ route("$routeAmbient.$routeCrud.$routeMethod") }}/#">Home</a></li>
                         <li class="breadcrumb-item active">{{ $titleBreadCrumb ?? "Sem titulo de BreadCrumb" }}</li>
                    </ol>
               </div><!-- /.col -->
          </div><!-- /.row -->
     </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
