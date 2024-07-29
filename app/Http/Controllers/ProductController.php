<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // Truy vân + logic
//        $objCate = new Category();
//        $listCate = $objCate->loadAllCate();
//        $arrayCate = [];
//        foreach ($listCate as $value){
//            $arrayCate[$value->id] = $value->name;
//        }
//        $this->view['listCate'] =  $arrayCate;
            ///
//        dd( $this->view['listCate']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    private function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('image_product', $fileName, 'public');
    }
    public function store(StoreProductRequest $request)
    {
        //
//        $validate = $request->validate(
//            [
//               'name'=> ['required', 'string', 'max:255'],
//                'price' => ['required', 'integer', 'min:1'],
//                'quantity' => ['required', 'integer', 'min:1'],
//                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
//                'category_id' => ['required', 'exists:categories,id']
//            ],
//            [
//              'name.required'=>'Trường tên không được bỏ trống',
//              'name.string'=>'Tên bắt buộc là chuỗi',
//              'name.max'=>'Trường tên không được vượt quá 255 ký tự',
//                // Lab 6
//            ]
//        );
//        dd($request->all());
//        dd($request->all());
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $data['image'] = $this->uploadFile($request->file('image'));
        }
        $objPro = new Product();
        $res = $objPro->insertDataProduct($data);
        if($res){
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm mới thành công');
        }else{
            return redirect()->back()->with('error', 'Sản phẩm đã được thêm mới không thành công');
        }
//        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
