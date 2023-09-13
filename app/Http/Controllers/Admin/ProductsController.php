<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['product_categorie'])->get();

        $product_categories = ProductCategory::get();

        return view('admin.products.index', compact('products', 'product_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('product_categories'));
    }

    public function store(StoreProductRequest $request)
    {

        $quantity_by_branch = $request->quantity;

        foreach($quantity_by_branch as $key=>$item){
            if(isset($item[0])){
                $quantity_by_branch[$key] = $item[0];
            }
        }

        $json_quantities = json_encode($quantity_by_branch);
        
        $product = Product::create($request->except('quantity'));
        $product->quantity = $json_quantities;
        $product->save();

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('product_categorie');

        return view('admin.products.edit', compact('product_categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $quantity_by_branch = $request->quantity;

        foreach($quantity_by_branch as $key=>$item){
            if(isset($item[0])){
                $quantity_by_branch[$key] = $item[0];
            }
        }

        $json_quantities = json_encode($quantity_by_branch);
        
        $product->update(
            array_merge(
                $request->except('quantity'),
                [
                    'quantity'=>$json_quantities
                ]
            )
        );

        return redirect()->route('admin.products.index');
    }



    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('product_categorie', 'productProductReturns', 'productDiscounts');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
