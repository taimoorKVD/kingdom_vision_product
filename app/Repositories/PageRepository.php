<?php

namespace App\Repositories;

use App\Http\Helper\Admin\ListingHelper;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\DB;

class PageRepository
{
    public function page_listing() {
        $per_page = ListingHelper::paginate_per_page('page');
        $query = Page::select('*', DB::raw("(SELECT count(pages.id) FROM pages) AS total_pages"));

        if(request()->title) {
            $title = request()->title;
            $query = $query->where(function ($q) use ($title) {
                $q->where('title', 'like', "%$title%");
            });
        }

        if(request()->slug) {
            $slug = request()->slug;
            $query = $query->where(function ($q) use ($slug) {
                $q->where('slug', 'like', "%$slug%");
            });
        }

        if(request()->search){
            $search = request()->search;
            $query = $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('slug', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%");
            });
        }

        $query = ListingHelper::filter('pages',request()->except(['created_at']),$query);
        return $query->orderByRaw("CASE WHEN total_pages > 0 THEN 1 ELSE 2 END ASC")
            ->orderBy('total_pages', 'desc')->paginate($per_page)
            ->appends(request()->query());
    }

    public function bulk_deletion() {
        try {
            if(isset(request()->deleteIds) && !empty(request()->deleteIds)) {
                foreach (request()->deleteIds as $id) {
                    $user = Page::find($id);
                    $user->delete();
                }
            }
            return response()->json([ 'status' => true, 'msg' => 'Bulk delete completed successfully' ]);
        } catch (\Exception $e) {
            return response()->json([ 'status' => false, 'msg' => $e->getMessage() ]);
        }
    }
}
