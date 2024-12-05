<?php

namespace App\Traits;

trait DatatableHelper
{
    /*     public function basicActions($row): array
    {
        $actions = [];
        $actions['Detail'] = route(str_replace('/', '.', request()->path()) . '.show', $row->id);
        if (user()->can('update ' . request()->path())) {
            $actions['Edit'] = route(str_replace('/', '.', request()->path()) . '.edit', $row->id);
        }
        if (user()->can('delete ' . request()->path())) {
            $actions['Delete'] = route(str_replace('/', '.', request()->path()) . '.destroy', $row->id);
        }

        return $actions;
    } */

    public function mybasicActions($row): array
    {
        $actions = [];
        $actions['Detail'] = route(str_replace('/', '.', request()->path()) . '.show', $row->id);
        if (user()->can('update ' . request()->path())) {
            $actions['Edit'] = route(str_replace('/', '.', request()->path()) . '.edit', $row->id);
        }
        if (user()->can('delete ' . request()->path())) {
            $actions['Delete'] = route(str_replace('/', '.', request()->path()) . '.destroy', $row->id);
        }

        return $actions;
    }


    public function basicActions($row): array
    {
        $actions = [];

        // Daftar kolom ID yang mungkin digunakan
        $possibleIdFields = ['id', 'idbk', 'idpk', 'idkk', 'id_personil', 'id_cp'];

        // Cari kolom ID yang ada di dalam $row
        $idField = null;
        foreach ($possibleIdFields as $field) {
            if (isset($row->$field)) {
                $idField = $field;
                break;
            }
        }

        // Jika kolom ID ditemukan, buat rute untuk detail, edit, dan delete
        if ($idField) {
            // Rute Detail
            $actions['Detail'] = route(str_replace('/', '.', request()->path()) . '.show', $row->$idField);

            // Rute Edit jika user memiliki permission
            if (user()->can('update ' . request()->path())) {
                $actions['Edit'] = route(str_replace('/', '.', request()->path()) . '.edit', $row->$idField);
            }

            // Rute Delete jika user memiliki permission
            if (user()->can('delete ' . request()->path())) {
                $actions['Delete'] = route(str_replace('/', '.', request()->path()) . '.destroy', $row->$idField);
            }
        }

        return $actions;
    }
}
