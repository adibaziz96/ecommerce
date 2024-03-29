<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cart = Cart::select('cart.user_id','cart.name','cart.imageSrc','cart.imageAlt','cart.price','cart.color','cart.size',DB::raw('count(*) as total'))
                    ->where('user_id',Auth::user()->id)
                    ->groupBy(['user_id','name','imageSrc','imageAlt','price','color','size'])
                    ->get();
        return view('cart',compact('cart'));
    }

    /**
     * Store new cart from create page
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $cart = [
			'user_id' => Auth::user()->id,
			'name' => $request->name,
			'color' => $request->color,
            'size' => $request->size,
			'price' => $request->price,
			'quantity' => '1',
			'imageSrc' => $request->imageSrc,
			'imageAlt' => $request->imageAlt,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		];

        try{
            Cart::create($cart);

            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            Cart::where('color',$request[0])
                ->where('size',$request[1])
                ->where('user_id',Auth::user()->id)
                ->delete();

            $cart = Cart::select('cart.user_id','cart.name','cart.imageSrc','cart.imageAlt','cart.price','cart.color','cart.size',DB::raw('count(*) as total'))
                        ->where('user_id',Auth::user()->id)
                        ->groupBy(['user_id','name','imageSrc','imageAlt','price','color','size'])
                        ->get();

            return $cart;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $cart = count(Cart::select('cart.user_id','cart.name','cart.imageSrc','cart.imageAlt','cart.price','cart.color','cart.size',DB::raw('count(*) as total'))
                            ->where('user_id',Auth::user()->id)
                            ->groupBy(['user_id','name','imageSrc','imageAlt','price','color','size'])
                            ->get());
        return response()->json($cart);
    }
}
