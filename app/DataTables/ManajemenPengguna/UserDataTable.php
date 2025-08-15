<?php

namespace App\DataTables\ManajemenPengguna;

use App\Models\User;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    use DatatableHelper;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('role', function (User $user) {
                return $user->roles->pluck('name')->implode(', '); // Gabungkan nama role dengan koma
            })
            ->addColumn('reset_password', function ($row) {
                return '<button type="button" class="btn btn-soft-danger btn-sm btn-reset-password" data-id="' . $row->id . '">Reset Password</button>';
            })
            ->addColumn('id_combined', function ($row) {
                // Cek apakah personal_id atau nis ada
                if (!empty($row->personal_id)) {
                    return $row->personal_id;
                } elseif (!empty($row->nis)) {
                    return $row->nis;
                }
                // Jika keduanya kosong, return string kosong
                return '';
            })
            ->addColumn('name', function (User $user) {
                return "<a href='#' class='switch-account-link' data-user-id='{$user->id}'>{$user->name}</a>";
            })
            ->addColumn('role_add', function (User $user) {
                // Fetch all roles
                $roles = \Spatie\Permission\Models\Role::pluck('name', 'id');
                $options = '';

                // Create a select input without pre-selecting any roles
                foreach ($roles as $id => $name) {
                    $options .= "<option value='{$id}'>{$name}</option>"; // No 'selected' attribute
                }

                return "<select class='form-control form-control-sm select-role-add' data-user-id='{$user->id}'>
                            <option value='' disabled selected>-- Select Role --</option>
                            {$options}
                        </select>";
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                unset($actions['Detail']);
                unset($actions['Delete']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['name', 'role', 'id_combined', 'role_add', 'reset_password', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $query = $model->newQuery()
            ->select('users.*') // Tidak perlu join karena personal_id dan nis ada di tabel users
            ->with('roles');    // Memuat relasi roles

        // Tambahkan filter pencarian berdasarkan nama
        if (request()->filled('searchName')) {
            $query->where('name', 'like', '%' . request('searchName') . '%');
        }

        if (request()->filled('role')) {
            $query->whereHas('roles', function ($q) {
                $q->where('name', request('role'));
            });
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax('', null, [
                'searchName' => 'function() { return $(".search-box .search").val(); }',
            ])
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 100,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 418px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false)->addClass('text-center')->width(50),
            Column::make('id_combined')->title('ID Identitas'),
            Column::make('name'),
            Column::make('email'),
            Column::make('role')->title('Roles'),
            Column::make('reset_password')->title('Reset Password')->addClass('text-center'),
        ];


        $user = User::find(Auth::user()->id);

        // Jika user memiliki role 'master', tambahkan kolom role_add
        if ($user && $user->hasRole('master')) {
            $columns[] = Column::make('role_add')->title('Roles Add');
            // Tambahkan kolom `action` di akhir
            $columns[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }



        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
