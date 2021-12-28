<?php

namespace App\Traits;

trait HasStatusAttribute
{
    public function getStatusBadgeAttribute()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-success">' . __('Işjeň') . '</span>';
        } else {
            return '<span class="badge badge-danger">' . __('Işjeň däl') . '</span>';
        }
    }
}
