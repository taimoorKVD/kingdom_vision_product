<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\Admin\ListingHelper;
use App\Models\Admin\Page;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $pageRepository;
    public function __construct(PageRepository $pageRepository)
    {
        $this->middleware('auth');
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        return view('admin.page.index')
        ->withTitle('Pages')
        ->withSingularTitle('page')
        ->withBulkDeleteRoute('page.bulk_delete')
        ->withPdfExportRoute('page.export_pdf')
        ->withExcelExportRoute('page.export_excel')
        ->withCurrPaginate(ListingHelper::paginate_per_page('page'))
        ->withAddBtnRoute(route('pages.create'));
    }

    public function listing() {
        return view('admin.page.listing')
            ->withPages($this->pageRepository->page_listing(request()->all()))
            ->withI((request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.page.create')
            ->withTitle('Pages > Add New Page')
            ->withBackBtnRoute(route('pages.index'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
           'title' => 'required|max:225',
           'slug' => 'required|unique:pages',
           'menu_type' => 'required'
        ]);
        $content = (str_replace('storage/photos/', 'storage/app/public/photos/', request()->builder));
        $page = new Page();
        $page->title = request()->title;
        $page->slug = request()->slug;
        $page->menu_type = request()->menu_type;
        $page->lb_content = $content;
        try {
            $page->save();
            return view('admin.page.show')
                ->withPage($page)
                ->withTitle('Pages > View Page')
                ->withBackBtnRoute(route('pages.index'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function show($slug)
    {
        $page = Page::where('slug',$slug)->get()->first();
        return view('admin.page.show')
            ->withPage($page)
            ->withTitle('Pages > View Page')
            ->withBackBtnRoute(route('pages.index'));
    }

    public function edit($slug)
    {
        $page = Page::where('slug',$slug)->get()->first();
        return view('admin.page.edit')
            ->withPage($page)
            ->withTitle('Pages > Edit Page')
            ->withBackBtnRoute(route('pages.index'));
    }

    public function update(Page $page)
    {
        $this->validate(request(),[
            'title' => 'required|max:225,title,'.$page->id,
            'slug' => 'required|unique:pages,slug,'.$page->id,
        ]);
        $content = (str_replace('storage/photos/', 'storage/app/public/photos/', request()->builder));
        $page->title = request()->title;
        $page->slug = request()->slug;
        $page->menu_type = request()->menu_type;
        $page->lb_content = $content;
        try {
            $page->save();
            return view('admin.page.show')
                ->withPage($page)
                ->withTitle('Pages > View Page')
                ->withBackBtnRoute(route('pages.index'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function destroy(Page $page)
    {
        try {
            $page->delete();
            return redirect()
                ->route('pages.index')
                ->with('success-message','Page deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function bulk_delete() {
        return $this->pageRepository->bulk_deletion(request()->all());
    }

    public function export_pdf() {
        /*return response()->download($this->userRepository->get_pdf())->deleteFileAfterSend(true);*/
    }

    public function export_excel() {
        /*return $this->userRepository->get_excel();*/
    }
}
