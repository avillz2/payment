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


                       <div class="col-md-12">
                         <div class="col-md-8 mx-auto">
                           <div class="card elevate shadow h-100">
                               <div class="card-body">


                                 <div class="row">
                                     <div class="col-md-6 my-3 text-center">
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
                                        <form method="POST" action="{{ route('pay') }}" class="form-horizontal" role="form">
                                            @csrf
                                            <div class="row" style="margin-bottom:40px;">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <p>
                                                        <div>
                                                            picture
                                                            ₦ {{$product->amount}}
                                                        </div>
                                                    </p>
                                                    <input type="hidden" name="email" value="Eghubareprecious@gmail.com"> {{-- required --}}
                                                    <input type="hidden" name="orderID" value="{{$product->id}}">
                                                    <input type="hidden" name="amount" value="50000"> {{-- required in kobo --}}
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['id' => $product->id,]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    {{-- {{ csrf_field() }} works only when using laravel 5.1, 5.2 --}}

                                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> employ this in place of csrf_field only in laravel 5.0 --}}

                                                    <p>
                                                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                     </div>
                                 </div>
                               </div>

                           </div>
                         </div>
                       </div>


                       </div>
                     </div>s
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
          </div>
       </div>
    </section>

@endsection





