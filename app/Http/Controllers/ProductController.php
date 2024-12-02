<?php

namespace App\Http\Controllers;
use App\Models\PhoneConfig;  // Thêm dòng này
use App\Models\Brand; 
use Illuminate\Support\Facades\Log;
use App\Models\Comment; // Thêm dòng này vào đầu file controller
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Tag;
class ProductController extends Controller
{
    //
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        
        return view('home.product',compact('brands','products','categories'));
    }
    public function showProductsByBrandName($brandName)
    {
        
        $brand = Brand::where('name', $brandName)->with('products')->first();
        $brands = Brand::all();
        $categories = Category::all();
        $products = ($brand->products)->where('category_id',1);
        // $config = $products->phoneConfig;
        if (isset($brand)) {
           return view('home.product', compact('products','brands','brand','categories') );
        } 
    }
    public function showProductsByCategory($name)
    {
    
        $category = Category::where('name', $name)->firstOrFail();
        $brands = Brand::all();
        $products = $category->products;
        $categories = Category::all();
        return view('home.product', compact('products','brands','categories','category') );
        
    }

    public function show($id)
    {   
        // Lấy tất cả các thương hiệu và danh mục
        $brands = Brand::all();
        $categories = Category::all();
        
        // Lấy sản phẩm theo ID
        $product = Product::with('phoneConfig')->findOrFail($id);

        
        // Lấy các bình luận của sản phẩm, giả sử cột 'product_id' trong bảng 'comments'
        $comments = Comment::where('product_id', $id)->get();  // Sửa lại điều kiện này để đúng
    
        // Lấy thông tin cấu hình của sản phẩm (nếu có)
        $config = $product->phoneConfig;
        
        // Lấy thông tin thương hiệu của sản phẩm
        $brand = $product->brand;
        
        // Lấy các sản phẩm liên quan cùng thương hiệu và danh mục, loại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('brand_id', $product->brand_id)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)  // Loại bỏ sản phẩm hiện tại
            ->get();
        
        // Trả về view với tất cả các dữ liệu cần thiết
        return view('home.inforProduct', compact('product', 'brands', 'categories', 'config', 'relatedProducts', 'comments'));
    }
    
    
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                   ->where('category_id', 1)
                   ->pluck('name');
        
        if ($products->isEmpty()) {
            return response('No products found');
        }
        $html = '';
        foreach ($products as $product) {
            $html .= '<li class="suggestion-item">' . htmlspecialchars($product) . '</li>';
        }
       
       
        return response($html);
    }
    public function compare(Request $request){
        $brands = Brand::all();
        $categories = Category::all();
        $phone1 = Product::where('name',$request->input('phone1'))->first();
        $phone2 = Product::where('name',$request->input('phone2'))->first();
        $config1 = $phone1->phoneConfig;
        $config2 = $phone2->phoneConfig;
        return view('home.compare_result', compact('config1','config2','phone1','phone2','brands','categories'));
    }

    public function showsearch(Request $request) {
        $brands = Brand::all();
        $categories = Category::all();
    
        // Tìm sản phẩm theo tên từ request
        $product = Product::where('name', $request->input('phonea'))->first();
    
        // Nếu sản phẩm không tồn tại, trả về trang lỗi hoặc thông báo
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Lấy các comment liên quan đến sản phẩm
        $comments = Comment::where('product_id', $product->id)->get();
    
        // Lấy cấu hình và thương hiệu của sản phẩm
        $config = $product->phoneConfig;
        $brand = $product->brand;
    
        // Lấy các sản phẩm liên quan cùng thương hiệu và danh mục, trừ sản phẩm hiện tại
        $relatedProducts = Product::where('brand_id', $product->brand_id)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();
    
        // Truyền dữ liệu vào view
        return view('home.inforProduct', compact(
            'config',
            'product',
            'brands',
            'categories',
            'relatedProducts',
            'comments'
        ));
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function phoneConfig()
    {
        return $this->hasOne(PhoneConfig::class);
    }


    public function admin_manage_product()
    {
        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $products = Product::all();
       
        // Kiểm tra dữ liệu
        // dd($products); // Để kiểm tra dữ liệu trước khi truyền vào view
        $tags = Tag::all(); // Lấy tất cả các tag
        // dd($tags); // Xem dữ liệu của $tags trước khi truyền vào view

        // Truyền danh sách sản phẩm vào view
        return view('home.admin_manage_product', compact('products','tags'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        // Kiểm tra dữ liệu gửi lên từ form
        $validated = $request->validate([
            'TenSP' => 'required|string|max:255',
            'DonGia' => 'required|numeric',
            'man_hinh' => 'required|string',
            'Chip' => 'required|string',
            'RAM' => 'required|string',
            'ROM' => 'required|string',
            'Pin' => 'required|string',
            'HinhAnh1' => 'image|nullable',
            'camera_truoc' => 'required|string',
            'camera_sau' => 'required|string',
        ]);
    
        try {
            // Lưu sản phẩm vào bảng products
            $product = Product::create([
                'name' => $request->TenSP,
                'original_price' => $request->DonGia,
                'discount_price' => $request->DonGia, // Nếu không có giá giảm, dùng giá gốc
                'brand_id' => $request->MaLSP,
                'category_id' => $request->MaDM,
                'main_image_path' => $this->uploadImage($request->file('HinhAnh1')),  // Lưu hình ảnh nếu có
            ]);
    
            // Lưu cấu hình điện thoại vào bảng phone_configs
            PhoneConfig::create([
                'product_id' => $product->id,
                'chip' => $request->Chip,
                'ram' => $request->RAM,
                'rom' => $request->ROM,
                'pin' => $request->Pin,
                'man_hinh' => $request->man_hinh,
                'camera_truoc' => $request->camera_truoc,
                'camera_sau' => $request->camera_sau,
            ]);
    
            // Nếu tất cả thành công, chuyển hướng về trang danh sách sản phẩm với thông báo thành công
            return redirect()->route('admin_manage_product')->with('success', 'Sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            // Nếu có lỗi, quay lại trang và hiển thị thông báo lỗi
            // return back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage());
            return redirect()->route('admin_manage_product')->with('success', 'Sản phẩm đã được thêm thành công!');
        }
    }
    

    
    
    
    

    public function uploadImage($image)
    {
        if ($image) {
            $path = $image->store('products', 'public');
            return $path;
        }
        return null; // Nếu không có ảnh, trả về null
    }
    
    

    public function add_product()
    {
        $categories = Category::all(); // Lấy danh sách các danh mục
        $brands = Brand::all(); // Lấy danh sách các hãng
        return view('add_product', compact('categories', 'brands'));
    }
    

    
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả các danh mục sản phẩm
        $brands = Brand::all(); // Lấy tất cả các thương hiệu
        return view('addproduct', compact('categories', 'brands')); // Trả về view và truyền dữ liệu
    }
    


    public function edit($id)
    {
        // Lấy tất cả các tag từ bảng tags
        $tags = Tag::all();
        
        // Lấy sản phẩm theo ID
        $product = Product::find($id);  
        
        // Lấy danh sách các danh mục và hãng
        $categories = Category::all();  
        $brands = Brand::all();         
        
        // Trả về view và truyền các dữ liệu vào
        return view('home.edit_product', compact('product', 'categories', 'brands', 'tags'));
    }
    


public function delete_product2($id)
{
    try {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id); // Nếu không tìm thấy sẽ ném lỗi

        // Xóa thông tin cấu hình của sản phẩm nếu có
        $product->phoneConfig()->delete();

        // Xóa sản phẩm
        $product->delete();

        // Trả về kết quả thành công
        return redirect()->route('admin_manage_product')->with('success', 'Sản phẩm đã được xóa!');
    } catch (\Exception $e) {
        // Trả về thông báo lỗi nếu có vấn đề
        return redirect()->route('admin_manage_product')->with('error', 'Có lỗi xảy ra khi xóa sản phẩm.');
    }
}

// Controller
public function updateTag(Request $request, Product $product)
{
    $tagId = $request->input('tag_id'); // Lấy tag_id từ request

    if ($tagId) {
        $product->tags()->attach($tagId, ['end_date' => now()->addDays(30)]);
    }

    return back()->with('success', 'Tag đã được cập nhật!');
}





}
