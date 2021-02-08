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
                     <div class="row">
                       <div class="col-md-12 mb-3">
                         <h3 class="pull-right pr-2">Download Article</h3>
                       </div>
                       @foreach ($products as $product)

                       <div class="col-md-12">
                         <div class="col-md-8 mx-auto">
                           <div class="card elevate shadow h-100">
                               <div class="card-body">


                                 <div class="row">
                                     <div class="col-md-6 ">

                                       <img src="{{$product->url}}" width="250px" alt="" title="">
                                         <li>Published:{{$product->product}}</li>
                                     </div>

                                     <div class="col-md-6 my-3 border-left py-2">
                                       <ul class="mb-5" style="list-style-type: square;">
                                         <li>Documentation Sample</li>
                                         <li>Pages: 210</li>
                                         <li>Author: Serial Developers</li>
                                         <li>Published:{{$product->created_at}}</li>
                                       </ul>
                                     </div>
                                     <div class="col-md-12 text-center">
                                     <a href="{{ route('product.show', $product->id) }}">  <button   id="payNow" class="btn btn-success col-md-6">Pay to Download ${{$product->amount}}</button></a>

                                     </div>
                                 </div>
                               </div>

                           </div>
                         </div>
                       </div>

                       @endforeach
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





