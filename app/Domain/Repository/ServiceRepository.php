<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ServiceRepository
{
    public function getAll(): Collection
    {
        return Service::orderBy('libelle', 'ASC')->get();
    }

    public function getone($id): Service
    {
        return Service::find($id);
    }

    public function getAllWithProjectsLimitBy3(): Collection
    {
        return Service::with(['projects' => function($q) {
            $q->limit(5)->orderBy('endProject');
        }])->get();
    }

    public function store(array $datas): void
    {
        if(isset($datas['service-id']) && !is_null($datas['service-id'])) {
            $service = $this->getone($datas['service-id']);
        } else {
            $service = new Service();
        }
        $service->libelle = $datas['service-libelle'];
        $service->description = $datas['service-description'];
        $service->expertise = $datas['service-expertise'];
        $service->icon = $datas['service-icon'];
        $service->color_icon = $datas['color_icon'];
        $service->slug = Str::slug($datas['service-libelle']);

        $service->save();
    }
}
