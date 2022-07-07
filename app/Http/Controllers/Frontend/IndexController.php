<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function home()
    {
        $banners = Banner::where(['status' => 'active', 'condition' => 'banner'])->orderBy('id', 'DESC')->limit('5')->get();
        $categories = Category::where(['status' => 'active', 'is_parent' => 1])->orderBy('id', 'DESC')->limit('3')->get();
        $products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit('8')->get();
        $randomproducts = Product::where(['status' => 'active'])->inRandomOrder()->limit(12)->get();

        return view('frontend.index', compact(['banners', 'categories', 'products', 'randomproducts']));
    }

    public function productCategory(Request $request, $slug)
    {
        $categories = Category::with('products')->where('slug', $slug)->first();


        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($categories == null) {
            return view('errors.404');
        } else {
            if ($sort == 'priceAsc') {
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('price', 'ASC')->get();
            } elseif ($sort == 'priceDesc') {
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('price', 'DESC')->get();
            } elseif ($sort == 'titleAsc') {
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('title', 'ASC')->get();
            } elseif ($sort == 'titleDesc') {
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('title', 'DESC')->get();
            } else {
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->get();
            }
        }
        $route = 'product-category';



        return view('frontend.pages.product.product-category', compact(['categories', 'route', 'products']));
    }
    // Product Detail
    public function productDetail($slug)
    {
        $product = Product::with('rel_prods')->where('slug', $slug)->first();

        $actual_link = 'http://' . $_SERVER["SERVER_NAME"];
        $photo = explode(',', $product->photo);
        $meta = '<meta itemprop="name" content="' . $product->title . '">
        <meta itemprop="description" content="' . substr(filter_var($product->description, FILTER_SANITIZE_STRING), 0, 200) . '...">
        <meta itemprop="image" content="' . $actual_link . $photo[0] . '">
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="' . $actual_link . '" />
        <meta property="twitter:title" content="' . $product->title . '" />
        <meta property="twitter:description" content="' . substr(filter_var($product->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
        <meta property="twitter:image" content="' . $actual_link . $photo[0] . '" />
        <meta property="twitter:site" content="@Defonsica" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="' . $product->title . '" />
        <meta property="og:description" content="' . filter_var($product->description, FILTER_SANITIZE_STRING) . '" />
        <meta property="og:image" content="' . $actual_link . $photo[0] . '" />';
        $title_page = $product->title;


        if ($product) {
            return view('frontend.pages.product.product-detail', compact(['product', 'meta', 'title_page']));
        } else {
            return 'Product Detail Not Found!!';
        }
    }

    // Contact Us
    public function contactUs()
    {
        return view('frontend.contact');
    }
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'lastname' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'content' => 'string|required',
        ]);

        $data = $request->all();


        Mail::send("frontend/mail/htmsg", $data, function ($message) use ($data) {
            $message->to("hawemiyassine1@gmail.com")->from($data['email'])->subject("Nouveau message de " . $data['email']);
        });

        return back()->with('success', 'Votre message a été envoyé avec succès');
    }

    // User Auth

    public function userAuth()
    {
        return view('frontend.auth.auth');
    }

    public function loginSubmit(Request $request)
    {

        $this->validate($request, [
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
            $request->session()->put('user', $request->email);

            if ($request->session()->get('url.intended')) {
                return Redirect::to($request->session()->get('url.intended'));
            } else {
                return redirect()->route('home')->with('success', 'Seccessfully login');
            }
        } else {
            return back()->with('error', 'invalid email & password!!');
        }
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'username' => 'nullable|string',
            'full_name' => 'required|string',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:4|confirmed',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        Session::put('user', $data['email']);
        Auth::login($check);

        if ($check) {
            return redirect()->route('home')->with('success', 'Seccessfully registred');
        } else {
            return back()->with('error', ['Please check your credentials!!']);
        }
    }

    private function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();

        return redirect()->home()->with('success', 'Seccessfully logout!!');
    }


    public function userDashboard()
    {
        $user = Auth::user();

        return view('frontend.user.dashboard', compact('user'));
    }

    public function userOrder()
    {
        $user = Auth::user();

        return view('frontend.user.order', compact('user'));
    }

    public function userAddress()
    {
        $user = Auth::user();

        return view('frontend.user.address', compact('user'));
    }
    public function userAccount()
    {
        $user = Auth::user();

        return view('frontend.user.account', compact('user'));
    }
}
