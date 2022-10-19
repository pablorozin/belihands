<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends WebBaseController
{
    public function home() {
        config(['web.sectionId' => 'home']);
        config(['web.seo.title' => 'Belihands']);
        config(['web.seo.description' => '']);

        $products = Product::query()
            ->active()
            ->limit(8)
            ->orderByDesc('is_bestseller')
            ->orderBy('code')
            ->get();

        return view('home', ['products' => $products]);
    }

    public function about_us() {
        config(['web.sectionId' => 'home']);
        config(['web.seo.title' => 'Belihands - Nosotros']);
        config(['web.seo.description' => '']);

        return view('about_us');
    }

    public function products() {
        config(['web.sectionId' => 'home']);
        config(['web.seo.title' => 'Belihands - Tienda']);
        config(['web.seo.description' => '']);

        $type = ProductType::where('slug', request()->type)->first();
        $category = ProductCategory::where('slug', request()->category)->first();

        $products = Product::query()
            ->active()
            ->when($type, fn ($q) => $q->where('product_type_id', $type->id))
            ->when($category, fn ($q) => $q->where('product_category_id', $category->id))
            ->when(request()->q, function ($q) {
                $q
                    ->where('name', 'like', '%'.request()->q.'%')
                    ->orWhere('keywords', 'like', '%'.request()->q.'%');

                foreach(explode(' ', request()->q) as $word) {
                    if (strlen($word) > 3) {
                        $q
                            ->where('name', 'like', '%'.$word.'%')
                            ->orWhere('keywords', 'like', '%'.$word.'%');
                    }
                }

                return $q;
            })
            ->orderBy('code')
            ->paginate(8);

        $products->appends([
            'type' => $type ? $type->slug : null,
            'category' => $category ? $category->slug : null,
        ]);

        return view('products', [
            'products' => $products,
            'type' => $type,
            'category' => $category,
        ]);
    }

    public function product($slug) {
        config(['web.sectionId' => 'home']);

        $product = Product::query()
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        config(['web.seo.title' => "Belihands - Tienda - $product->name"]);
        config(['web.seo.description' => $product->type->description]);

        return view('product', ['product' => $product]);
    }

    public function contact() {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'name' => 'required',
        ]);
        
        if($validator->errors()->has('email')) {
            return redirect()
                ->back()
                ->with('messageType', 'error')
                ->with('message', 'El email debe ser una casilla de correo válida.');
        }
        
        if($validator->errors()->has('name')) {
            return redirect()
                ->back()
                ->with('messageType', 'error')
                ->with('message', 'El nombre es requerido.');
        }
         
        $product = Product::query()
            ->active()
            ->where('id', request()->product)
            ->first();

        try {
            Mail::to('losbelihands@gmail.com')->send(new Contact(
                request()->name,
                request()->email,
                request()->phone,
                request()->comments,
                $product,
            ));
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('messageType', 'error')
                ->with('message', 'El producto no existe');
        }

        return redirect()
            ->back()
            ->with('messageType', 'success')
            ->with('message', 'Gracias por contactarnos, te estaremos respondiendo a la brevedad.');
    }
}
