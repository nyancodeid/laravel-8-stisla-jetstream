<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <div class="flex pb-4 -ml-3">
            <a href="{{ $data->href->create_new }}"  class="-ml- btn btn-primary shadow-none">
                <span class="fas fa-plus"></span> {{ $data->href->create_new_text }}
            </a>
            <a href="{{ $data->href->export }}" class="ml-2 btn btn-success shadow-none">
                <span class="fas fa-file-export"></span> {{ $data->href->export_text }}
            </a>
        </div>

        <div class="row mb-4">
            <div class="col form-inline">
                Per Page: &nbsp;
                <select wire:model="perPage" class="form-control">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
            </div>

            <div class="col">
                <input wire:model="search" class="form-control" type="text" placeholder="Search...">
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm text-gray-600">
                    <thead>
                        {{ $head }}
                    </thead>
                    <tbody>
                        {{ $body }}
                    </tbody>
                </table>
            </div>
        </div>

        <div id="table_pagination" class="py-3">
            {{ $model->onEachSide(1)->links() }}
        </div>
    </div>
</div>

