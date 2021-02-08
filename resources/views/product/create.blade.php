@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">

                </div><!--end col-->
                <div class="col-auto align-self-center">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>

                    </ol>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->

<section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-12">





               <div class="card ">
                 <div class="card-body">
                     {{-- <div class="row"> --}}
                       <div class="col-md-12 mb-3">
                         <h3 class="pull-right pr-2">Create New Product</h3>
                       </div>
                       <form action="{{ route('product.store') }}" method='POST' enctype ='multipart/form-data'>
                        @csrf
                       <div class="col-md-12">
                         <div class="col-md-8 mx-auto">
                           <div class="card elevate shadow h-100">
                               <div class="card-body">
                                 <div class="row">



                                    <div class="col-md-12 text-center">
                                                    <input type="text" name="name" id="name" value="{{old('name')}}" />
                                                    <input type="file" name="product" id="input-file-now" class="dropify" />

                                    </div>

                                    <div class="form-group">
                                        <label for="name">amount</label>
                                        <input type="text" name="amount"  id="amount" class="form-control" value="{{ old('name') }}" required placeholder="Permission Name">

                                </div>
                                    <br>
                                     <div class="col-md-12 text-center">
                                       <button type="submit"class="btn btn-success col-md-6">Create new product</button>
                                     </div>
                                 </div>

                               </div>
                           </div>
                         </div>
                       </div>
                    </form>
                       </div>
                     </div>
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
          </div>
       </div>
    </section>

@endsection





