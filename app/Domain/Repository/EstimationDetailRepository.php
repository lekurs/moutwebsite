<?php


namespace App\Domain\Repository;


use App\Domain\Entity\EstimationDetail;

class EstimationDetailRepository
{
    public function getOneById(EstimationDetail $estimationDetail)
    {

    }

    public function update(array $data)
    {
//        dd($data);
        $detail = EstimationDetail::whereId($data['detail_id'])->first();
        $detail->product = $data['product'];
        $detail->description = $data['description'];
        $detail->quantity = $data['quantity'];
        $detail->total_row_notax = $data['price'];
        $detail->taxe_id = $data['tax'];

        //ici faire le calcul

        $detail->save();

    }
}
