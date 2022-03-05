<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeOptionRequest;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('name', 'ASC')->paginate(10);

        return view('pages.admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Attribute::types();
        $booleanOptions = Attribute::booleanOptions();
        $validations = Attribute::validations();

        return view('pages.admin.attributes.create')->with([
            'types' => $types,
            'booleanOptions' => $booleanOptions,
            'validations' => $validations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $data = $request->all();
        $data['is_required'] = (bool) $data['is_required'];
        $data['is_unique'] = (bool) $data['is_unique'];
        $data['is_configurable'] = (bool) $data['is_configurable'];
        $data['is_filterable'] = (bool) $data['is_filterable'];

        if (Attribute::create($data)) {
            Session()->flash('success', 'Atribut baru berhasil ditambahkan.');
        }

        return redirect()->route('attributes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Attribute::types();
        $booleanOptions = Attribute::booleanOptions();
        $validations = Attribute::validations();

        $attribute = Attribute::findOrFail($id);

        return view('pages.admin.attributes.edit')->with([
            'types' => $types,
            'booleanOptions' => $booleanOptions,
            'validations' => $validations,
            'attribute' => $attribute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // AttributeRequest
    {
        $data = $request->all();
        $data['is_required'] = (bool) $data['is_required'];
        $data['is_unique'] = (bool) $data['is_unique'];
        $data['is_configurable'] = (bool) $data['is_configurable'];
        $data['is_filterable'] = (bool) $data['is_filterable'];

        unset($data['code']);
        unset($data['type']);

        // return dd($data);

        $attribute = Attribute::findOrFail($id);

        if ($attribute->update($data)) {
            Session()->flash('success', 'Atribut berhasil diubah.');
        }

        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);

        if ($attribute->delete()) {
            Session()->flash('success', 'Produk berhasil dihapus.');
        }

        return redirect()->route('attributes.index');
    }

    public function deletePermanent($id)
    {
        $attribute = Attribute::findOrFail($id);

        if ($attribute->forceDelete()) {
            Session()->flash('success', 'Produk berhasil dihapus.');
        }

        return redirect()->route('attributes.index');
    }

    public function options($attributeID)
    {
        $attribute = Attribute::findOrFail($attributeID);

        return view('pages.admin.attributes.options', compact('attribute'));
    }

    public function store_option(AttributeOptionRequest $request, $attributeID)
    {
        $data =  [
            'attribute_id' => $attributeID,
            'name' => $request->get('name'),
        ];

        if (AttributeOption::create($data)) {
            Session()->flash('success', 'Opsi Atribut berhasil ditambahakan.');
        }

        return redirect()->route('attributes.options', $attributeID);
    }

    public function edit_option($optionID)
    {
        $option = AttributeOption::findOrFail($optionID);

        $attributeOption = $option;
        $attribute = $option->attribute;

        return view('pages.admin.attributes.options', compact('attributeOption', 'attribute'));
    }

    public function update_option(AttributeOptionRequest $request, $optionID)
    {
        $option = AttributeOption::findOrFail($optionID);
        $data = $request->all();

        if ($option->update($data)) {
            Session()->flash('success', 'Opsi Atribut berhasil diubah.');
        }

        return redirect()->route('attributes.options', $option->attribute->id);
    }

    public function remove_option($optionID)
    {
        $option = AttributeOption::findOrFail($optionID);

        if ($option->forceDelete()) {
            Session()->flash('success', 'Opsi Atribut berhasil dihapus.');
        }

        return redirect()->route('attributes.options', $option->attribute->id);
    }
}
