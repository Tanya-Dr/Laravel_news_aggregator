<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\StoreRequest;
use App\Http\Requests\Sources\UpdateRequest;
use App\Models\Source;
use App\Queries\QueryBuilderSources;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param QueryBuilderSources $sources
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(QueryBuilderSources $sources)
    {
        return view('admin.sources.index',[
            'sources' => $sources->getSources()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $source = new Source($validated);

        if($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.sources.create.success'));
        }

        return back()->with('error', __('message.admin.sources.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Source $source)
    {
        $validated = $request->validated();
        $source = $source->fill($validated);

        if($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.sources.update.success'));
        }

        return back()->with('error', __('message.admin.sources.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Source $source)
    {
        try{
            $source->delete();

            return \response()->json('ok');
        }catch (\Exception $e) {
            \Log::error($e->getMessage());

            return response()->json('error', 400);
        }
    }
}
