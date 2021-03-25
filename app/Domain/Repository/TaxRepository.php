<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Taxe;
use Illuminate\Database\Eloquent\Collection;

class TaxRepository
{
    public function getAll(): Collection
    {
        return Taxe::orderByDesc('main')->get();
    }

    public function getOneById(int $id): Taxe
    {
        return Taxe::whereId($id)->first();
    }

    public function store(array $data): void
    {
        $tax = new Taxe();
        $tax->tax = $data['tax'];
        if(isset($data['main-tax'])) {
            $tax->main = $data['main-tax'];
        }
        $tax->save();
    }

    public function edit(int $id, array $data): void
    {
        $tax = Taxe::whereId($id)->first();

        $tax->tax = $data['tax'];
        if(isset($data['main-tax'])) {
            $tax->main = $data['main-tax'];
        } else {
            $tax->main = false;
        }

        $tax->save();
    }

    public function delete(int $id)
    {
        $tax = Taxe::whereId($id)->first();
        $tax->delete();
    }
}
