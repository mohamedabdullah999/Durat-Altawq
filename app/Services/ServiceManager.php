<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceManager
{
    public function getFrontendServices()
    {
        return Cache::rememberForever('frontend_services', function () {
            return Service::latest()->get();
        });
    }

    public function getAllServicesForAdmin()
    {
        return Service::latest()->paginate(3);
    }



    public function createService(array $data)
    {
        $service = Service::create($data);
        $this->clearCache();
        return $service;
    }

    public function updateService(Service $service , array $data)
    {
        $service->update($data);
        $this->clearCache();
        return $service;
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('frontend_services');
    }
}
