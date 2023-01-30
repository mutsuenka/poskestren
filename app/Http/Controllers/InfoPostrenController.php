<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoPostrenRequest;
use App\Http\Requests\UpdateInfoPostrenRequest;
use App\Models\InfoPostren;

class InfoPostrenController extends Controller
{
    public function edit(InfoPostren $infoPostren)
    {
        return view('info_postren.edit');
    }

    public function update(UpdateInfoPostrenRequest $request, InfoPostren $infoPostren)
    {
        $infoPostren->update($request->validated());

        return to_route('info_postren.edit')->with('status', 'success');
    }

}
