<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ServiceRequest;
use App\Services\ServiceManager;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __construct(protected ServiceManager $serviceManager)
    {}

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $services = $this->serviceManager->getAllServicesForAdmin();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $this->serviceManager->createService($request->validated());
        return redirect()->route('admin.services.index')->with('success', 'تم إضافة الخدمة بنجاح.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $this->serviceManager->updateService($service , $request->validated());
        return redirect()->route('admin.services.index')->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->serviceManager->deleteService($service);
        return redirect()->route('admin.services.index')->with('success', 'تم حذف الخدمة بنجاح.');
    }
}
