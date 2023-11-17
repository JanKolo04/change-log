<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class ModuleController extends Controller
{
    public function getTags(int $id): ?object
    {
        $moduleTags = DB::table('module_tags')
                        ->join('tags', 'tags.id', '=', 'module_tags.tag_id')
                        ->select('tags.bg_color', 'tags.text_color', 'tags.text')
                        ->where('module_tags.module_id', $id)
                        ->orderBy('tags.text', 'desc')
                        ->get();
        
        return $moduleTags;
    }

    /**
     * Get all versions
     * 
     * @param int $id
     */
    public function getChangelog(int $id): ?object
    {
        $changelogs = DB::table('changelogs_list')
                    ->where('module_id', $id)
                    ->orderBy('version', 'desc')
                    ->get();

        return $changelogs;
    }

    /**
     * Get all issues 
     * 
     * @param int $id
     */
    public function getIssues(int $id): ?object
    {
        $issues = DB::table('issues')->where('module_id', $id)->get();

        return $issues;
    }

    /**
     * Show module data
     * 
     * @param int $id
     */
    public function showData(int $c_id, int $m_id): View
    {
        $module = DB::table('modules')->where('id', $m_id)->get();

        return view('modules.index', [
            'category_id' => $c_id,
            'module' => $module[0],
            'tags' => $this->getTags($m_id),
            'versions' => $this->getChangelog($m_id),
            'issues' => $this->getIssues($m_id)
        ]);
    }
}