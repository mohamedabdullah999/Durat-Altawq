<?php

namespace App\Services;

use App\Models\Partner;
use Illuminate\Support\Facades\Cache;

class PartnerManager
{
    protected $cacheKey = 'active-partners';

    public function getAllPartnersForAdmin()
    {
        return Partner::latest()->paginate($perpage = 10);
    }

    public function getFrontendPartners()
    {
        return Cache::rememberForever($this->cacheKey, function () {
            return Partner::latest()->get();
        });
    }

    public function createPartner(array $data)
    {
        $partner = Partner::create($data);
        $this->clearCache();
        return $partner;
    }

    public function updatePartner(Partner $partner, array $data)
    {
        $partner->update($data);
        $this->clearCache();
        return $partner;
    }

    public function deletePartner(Partner $partner)
    {
        $partner->delete();
        $this->clearCache();
    }

    public function clearCache()
    {
        Cache::forget($this->cacheKey);
    }
}
