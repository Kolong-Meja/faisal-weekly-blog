<?php

namespace App\Utils;

use Illuminate\Support\Carbon;

class ModelStats {
    protected const TOTAL_DAYS = 7;

    /**
     * Count model total data
     * 
     * @param $model Model that will be counted.
     * 
     * @return mixed
     */
    public function countTotalModelData($model): mixed {
        $modelStats = $model::query()
        ->select('id')
        ->addSelect(['last_data' => $model::selectRaw('count(*) as total')
            ->whereDate('created_at', '<', Carbon::now('Asia/Jakarta')->subDays($this::TOTAL_DAYS))])
        ->addSelect(['new_data' => $model::selectRaw('count(*) as total')
            ->whereDate('created_at', '>=', Carbon::now('Asia/Jakarta')->subDays($this::TOTAL_DAYS))])
        ->first();

        if (!is_null($modelStats)) {
            return $modelStats;
        } else {
            return null;
        }
    }
}