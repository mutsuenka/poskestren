<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoPostrenRequest;
use App\Http\Requests\UpdateInfoPostrenRequest;
use App\Models\InfoPostren;

class InfoPostrenController extends Controller
{
    public function edit()
    {
        $infoPostren = InfoPostren::find(1)->get();
        return view('info_postren.edit', compact('infoPostren'));
    }

    public function update(UpdateInfoPostrenRequest $request, InfoPostren $infoPostren)
    {
        $infoPostren->update($request->validated());

        return view('info_postren.edit', compact('infoPostren'));
        // return to_route('info-postren.edit');
    }

}
