<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use App\Utils\ModelStats;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    protected ModelStats $modelStats;

    public function __construct(ModelStats $modelStats)
    {
        $this->modelStats = $modelStats;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usersStats = $this->modelStats->countTotalModelData(User::class);
        $articleStats = $this->modelStats->countTotalModelData(Article::class);
        $categoryStats = $this->modelStats->countTotalModelData(Category::class);
        $feedbackStats = $this->modelStats->countTotalModelData(Feedback::class);

        // percentages
        $usersTotalPercentage = 0;
        $articlesTotalPercentage = 0;
        $categoriesTotalPercentage = 0;
        $feedbackTotalPercentage = 0;
        
        if (!empty($usersStats->last_data)) {
            $usersTotalPercentage = ($usersStats->last_data != 0) ? ($usersStats?->new_data - $usersStats?->last_data) / $usersStats?->last_data * 100 : 0;
        }

        if (!empty($articleStats->last_data)) {
            $articlesTotalPercentage = ($articleStats->last_data != 0) ? ($articleStats?->new_data - $articleStats?->last_data) / $articleStats?->last_data * 100 : 0;
        }

        if (!empty($categoryStats->last_data)) {
            $categoriesTotalPercentage = ($categoryStats->last_data != 0) ? ($categoryStats?->new_data - $categoryStats?->last_data) / $categoryStats?->last_data * 100 : 0;
        }

        if (!empty($feedbackStats->last_data)) {
            $feedbackTotalPercentage = ($feedbackStats->last_data != 0) ? ($feedbackStats?->new_data - $feedbackStats?->last_data) / $feedbackStats?->last_data * 100 : 0;
        }

        $articles =  DB::table('articles')
        ->select(DB::raw("COUNT(*) as count"), 
            DB::raw("DATE_FORMAT(created_at, 'Month') as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy(DB::raw("MIN(created_at)"), 'ASC')
        ->pluck('count', 'month_name');
        
        $labels = $articles->keys();
        
        $data = $articles->values();

        return view('admin.dashboard', compact(
            'usersStats',
            'articleStats',
            'categoryStats',
            'feedbackStats',
            'usersTotalPercentage',
            'articlesTotalPercentage',
            'categoriesTotalPercentage',
            'feedbackTotalPercentage',
            'labels',
            'data',
        ));
    }

    public function setting(): View
    {
        return view('admin.setting');
    }
}
