<?php

namespace Domains\Banks\Http\Controllers\Admin;

use Domains\Banks\Actions\GetAllBanksAction;
use Domains\Banks\Actions\StoreBankAction;
use Domains\Banks\Actions\UpdateBankAction;
use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Http\Requests\CreateBankRequest;
use Domains\Banks\Http\Requests\DeleteBankRequest;
use Domains\Banks\Http\Requests\EditBankRequest;
use Domains\Banks\Http\Requests\IndexBankRequest;
use Domains\Banks\Http\Requests\ShowBankRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Banks\Http\Requests\MassDestroyBankRequest;
use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Models\Bank;
use Domains\Countries\Models\Country;
use Symfony\Component\HttpFoundation\Response;

class BanksController extends Controller
{
    public function index(IndexBankRequest $request, GetAllBanksAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.banks.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateBankRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.banks.create', compact('countries'));
    }

    public function store(StoreBankRequest $request, StoreBankAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(BankData::fromRequest($request));
        return redirect()->route('admin.banks.index');
    }

    public function edit(EditBankRequest $request, Bank $bank): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank->load('country');

        return view('admin.banks.edit', compact('countries', 'bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank, UpdateBankAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($bank, BankData::fromRequest($request));

        return redirect()->route('admin.banks.index');
    }

    public function show(ShowBankRequest $request, Bank $bank): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $bank->load('country');

        return view('admin.banks.show', compact('bank'));
    }

    public function destroy(DeleteBankRequest $request, Bank $bank): \Illuminate\Http\RedirectResponse
    {
        $bank->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankRequest $request): \Illuminate\Http\Response
    {
        Bank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
