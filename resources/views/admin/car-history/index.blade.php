@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('admin.partials.breadcrumb')
        <div class=" space-y-5">
            <div class="historyd">
                <header class=" historyd-header noborder">
                    <h4 class="historyd-title">{{ $title }}
                    </h4>
                </header>
                @include('admin.partials.alert')
                <div class="historyd-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Id
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama Mobil
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama Pegawai
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama Driver
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Tanggal Pinjam
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Tanggal Dikembalikan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Note
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($histories as $key => $history)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $history->order->car->car_name }}</td>
                                                <td class="table-td">{{ $history->order->employee->employee_name }}</td>
                                                <td class="table-td">{{ $history->order->driver->driver_name }}</td>
                                                <td class="table-td">{{ \Carbon\Carbon::parse($history->history_pinjam)->format('d M Y') }}</td>
                                                <td class="table-td">{{ $history->history_kembali != null ? \Carbon\Carbon::parse($history->history_kembali)->format('d M Y') : 'Belum Dikembalikan' }}</td>
                                                <td class="table-td">{{ $history->history_note }}</td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('admin.car-history.show', $history->id) }}" class="toolTip onTop justify-center action-btn" data-tippy-content="Show" data-tippy-theme="primary">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                        @if ($history->history_kembali == null)
                                                            <a href="{{ route('admin.car-history.edit', $history->id) }}" class="toolTip onTop justify-center action-btn" data-tippy-content="Edit" data-tippy-theme="info">
                                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
