<?php

namespace App\Repositories;

use App\Models\Admin\Setting;

class PaginationRepository
{
    public function set_pagination() {
        $table = request()->table;
        $paginate_val = Setting::where('name', $table.'_paginate_per_page')->get()->first();
        if(isset($paginate_val) && !empty($paginate_val)) {
            try {
                $paginate = Setting::where('name', $table.'_paginate_per_page')
                    ->update([
                        'value' => request()->value,
                    ]);
                return ['resp' => true, 'msg' => 'Pagination updated successfully'];
            } catch (\Exception $e) {
                return ['resp' => false, 'msg' => $e->getMessage()];
            }
        }
        else {
            $set_paginate = new Setting();
            $set_paginate->name = $table.'_paginate_per_page';
            $set_paginate->value = request()->value;
            try {
                $set_paginate->save();
                return ['resp' => true, 'msg' => 'Pagination updated successfully'];
            } catch (\Exception $e) {
                return ['resp' => false, 'msg' => $e->getMessage()];
            }
        }
    }
}
