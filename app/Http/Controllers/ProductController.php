<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Str;


class ProductController extends Controller
{

    public $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =   Product::all();
        return view('product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(["auth", 'role:managers']);
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'amount' => 'required',
            'product'=>'file|nullable'

        ]);
                //to handle the file upload
                if($request ->hasFile('product')){
                    //get file name with extension
                    $image = $request ->file('product');
                    $imageName = $request->name.'-'.Str::random(4).'.'. $request->file('product')->getClientOriginalExtension();
                    $imagePath = public_path('/products');
                    $image->move($imagePath,$imageName);
                    $url = url('/products'.'/'.$imageName);

                }
            $product = $this->product->create([
                'product' => $request->name,
                'url' => $url,
                'amount' => $request->amount,
            ]);
        return redirect('product')->with('success','Product send.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= product::find($id);
        return view('product.show')->with([
            'product'=> $product,


            ]);
    }

    public function succ()
    {
        return view('product.succ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function download( Request $request)
    // {
    //    $name = $request->name;
    //     $file =public_path()."$name";

    //     $headers = array(
    //         'content-type:application/image',
    //     );

    //     return response()->download($file, $name, $headers);

    // }
}
