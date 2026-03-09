<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PartnerRequest;
use App\Services\PartnerManager;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function __construct(protected PartnerManager $partnerManager)
    {
    }

    public function index()
    {
        $partners = $this->partnerManager->getAllPartnersForAdmin();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $this->partnerManager->createPartner($request->validated());
        return redirect()->route('admin.partners.index')->with('success', 'تم إضافة الشريك بنجاح.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $this->partnerManager->updatePartner($partner, $request->validated());
        return redirect()->route('admin.partners.index')->with('success', 'تم تحديث الشريك بنجاح.');
    }

    public function destroy(Partner $partner)
    {
        $this->partnerManager->deletePartner($partner);
        return redirect()->route('admin.partners.index')->with('success', 'تم حذف الشريك بنجاح.');
    }
}
