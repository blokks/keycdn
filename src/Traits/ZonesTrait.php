<?php

namespace Blokks\Services\Traits;

trait ZonesTrait
{
    public function purgeZone(int $zone)
    {
        return $this->get("zones/purge/$zone.json");
    }


    public function purgeZoneByUrls(int $zone, array $urls = [])
    {
        return $this->delete("zones/purgeurl/$zone.json", [
            'urls' => $urls,
        ]);
    }


    public function purgeZoneByTags(int $zone, array $tags = [])
    {
        return $this->delete("zones/purgetag/$zone.json", [
            'tags' => $tags,
        ]);
    }
}
