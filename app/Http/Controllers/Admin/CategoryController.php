<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $backgroundPath = $this->uploadImage($request, 'background');
        $iconPath = $this->uploadImage($request, 'icon');

        $category = new Category();
        $category->name = $request->name;
        $category->background_image = $backgroundPath;
        $category->image_icon = $iconPath;
        $category->status = $request->status;
        $category->show_at_home = $request->show_at_home;
        $category->save();

        Notify::success('Category Created Successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $backgroundPath = $this->uploadImage($request, 'background', $request->old_background);
        $iconPath = $this->uploadImage($request, 'icon', $request->old_icon);

        $category->name = $request->name;
        $category->background_image = !empty($backgroundPath) ? $backgroundPath : $request->old_background;
        $category->image_icon = !empty($iconPath) ? $iconPath : $request->old_icon;
        $category->status = $request->status;
        $category->show_at_home = $request->show_at_home;

        $category->save();
        Notify::success('Category Updated Successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Delete the image from the storage
        $this->deleteFile($category->background_image);
        $this->deleteFile($category->image_icon);

        $category->delete();
        Notify::success('Category Deleted Successfully');
        return response()->json(['success' => true]);
    }
}
