<table class="table table-sm table-bordered table-hover table-striped" id="listing_table">
    <thead>
    <tr>
        <th class="text-center">
            <div class="form-check">
                <input class="form-check-input page-checkbox-all" type="checkbox" id="check_all">
                <label class="form-check-label" for="check_all"></label>
            </div>
        </th>
        <th>No#</th>
        <th>Title</th>
        <th>Slug</th>
        <th style="width:280px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if($pages->count() > 0)
        @foreach ($pages as $key => $page)
            <tr>
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input page-checkbox" name="page_ids[]" type="checkbox" value="{{ $page->id }}" id="page-{{ $page->id }}">
                        <label class="form-check-label" for="page-{{ $page->id }}"></label>
                    </div>
                </td>
                <td>{{ ++$i }}</td>
                <td>
                    <a class="text-dark" href="{{ route('pages.show',$page->slug) }}">
                        {{ $page->title }}
                    </a>
                </td>
                <td>
                    <a class="text-dark" href="{{ route('pages.show',$page->slug) }}">
                        {{ $page->slug }}
                    </a>
                </td>
                <td>
                    <a class="" href="{{ route('pages.show',$page->slug) }}">
                        <span class="material-icons">visibility</span>
                    </a>
                    |
                    <a class="" href="{{ route('pages.edit',$page->slug) }}">
                        <span class="material-icons">
                            edit
                        </span>
                    </a>
                    |
                    <a href="javascript:void(0)" class="" onclick="handleDelete( {{ $page->id }} )">
                        <span class="material-icons">
                            delete
                        </span>
                    </a>
                    <input type="hidden" value="{!! url('admin/pages') !!}" id="deleteMe">
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="100%" class="text-center">No record found</td>
        </tr>
    @endif
    </tbody>
    <tfoot>
    <tr>
        <td></td>
        <td><b>No#</b></td>
        <td><b>Title</b></td>
        <td><b>Slug</b></td>
        <td style="width:280px"><b>Action</b></td>
    </tr>
    </tfoot>
</table>
<div class="pagination-links">
    {{ $pages->links('admin.partial.pagination') }}
</div>
