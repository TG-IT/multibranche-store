<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExpanseRequest;
use App\Http\Requests\StoreExpanseRequest;
use App\Http\Requests\UpdateExpanseRequest;
use App\Models\Expanse;
use App\Models\ExpenseCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExpansesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('expanse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expanses = Expanse::with(['expensecategory', 'media'])->get();

        $expense_categories = ExpenseCategory::get();

        return view('admin.expanses.index', compact('expanses', 'expense_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('expanse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensecategories = ExpenseCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expanses.create', compact('expensecategories'));
    }

    public function store(StoreExpanseRequest $request)
    {
        $expanse = Expanse::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $expanse->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $expanse->id]);
        }

        return redirect()->route('admin.expanses.index');
    }

    public function edit(Expanse $expanse)
    {
        abort_if(Gate::denies('expanse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensecategories = ExpenseCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expanse->load('expensecategory');

        return view('admin.expanses.edit', compact('expensecategories', 'expanse'));
    }

    public function update(UpdateExpanseRequest $request, Expanse $expanse)
    {
        $expanse->update($request->all());

        if (count($expanse->attachments) > 0) {
            foreach ($expanse->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $expanse->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $expanse->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.expanses.index');
    }

    public function show(Expanse $expanse)
    {
        abort_if(Gate::denies('expanse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expanse->load('expensecategory');

        return view('admin.expanses.show', compact('expanse'));
    }

    public function destroy(Expanse $expanse)
    {
        abort_if(Gate::denies('expanse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expanse->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpanseRequest $request)
    {
        Expanse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('expanse_create') && Gate::denies('expanse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Expanse();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
