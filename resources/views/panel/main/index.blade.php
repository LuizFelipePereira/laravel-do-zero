@extends("$routeAmbient.template.index")
@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     @include("$routeAmbient.$routeCrud.breadcrumb")

     <div class="content">
          <div class="container-fluid">
               <div class="row">

               </div>

          </div>

     </div>

</div>

@endsection
@includeIf("$routeAmbient.$routeCrud.Local.$routeMethod.javascript")
@includeIf("$routeAmbient.$routeCrud.Local.$routeMethod.head")

