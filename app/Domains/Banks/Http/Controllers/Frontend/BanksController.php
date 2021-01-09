<?php

namespace Domains\Banks\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Domains\Banks\Http\Requests\MassDestroyBankRequest;
use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Models\Bank;
use Domains\Countries\Models\Country;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanksController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banks = Bank::with(['country'])->get();

        return view('frontend.banks.index', compact('banks'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.banks.create', compact('countries'));
    }

    public function store(StoreBankRequest $request): \Illuminate\Http\RedirectResponse
    {
        $bank = Bank::create($request->all());

        return redirect()->route('frontend.banks.index');
    }

    public function edit(Bank $bank): \Illuminate\View\View
    {
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank->load('country');

        return view('frontend.banks.edit', compact('countries', 'bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank): \Illuminate\Http\RedirectResponse
    {
        $bank->update($request->all());

        return redirect()->route('frontend.banks.index');
    }

    public function show(Bank $bank): \Illuminate\View\View
    {
        abort_if(Gate::denies('bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->load('country');

        return view('frontend.banks.show', compact('bank'));
    }

    public function destroy(Bank $bank): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankRequest $request): \Illuminate\Http\Response
    {
        Bank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
