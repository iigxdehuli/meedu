<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) 杭州白书科技有限公司
 */

namespace App\Http\Controllers\Backend\Api\V1;

use App\Services\Other\Models\Link;
use App\Http\Requests\Backend\LinkRequest;

class LinkController extends BaseController
{
    public function index()
    {
        $links = Link::orderBy('sort')->paginate(request()->input('size', 12));

        return $this->successData($links);
    }

    public function store(LinkRequest $request)
    {
        Link::create($request->filldata());

        return $this->success();
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);

        return $this->successData($link);
    }

    public function update(LinkRequest $request, $id)
    {
        $role = Link::findOrFail($id);
        $role->fill($request->filldata())->save();

        return $this->success();
    }

    public function destroy($id)
    {
        Link::destroy($id);

        return $this->success();
    }
}
