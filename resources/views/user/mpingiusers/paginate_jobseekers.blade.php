<div class="row" id="dynamic_content_s">
    <div id="load_data"></div>
      <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                {{ $ajobs->links('pagination.custom')}}
            </div>
        </div>
      </div>

    @forelse($ajobs as $row)
    <div class="col-md-6">
        <a href="{{ route('user.jobitems',['id'=> encrypt($row->id) ]) }}" class="removeU">
            <div class="mb-1">
                <i class="fas fa-bullseye" style="font-size:8px"></i>
                {{ $row->job_category_name_en }}
            <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
            </div>
        </a>

    </div>
    @empty

    <div class="alert alert-danger lign-items-center" role="alert">
        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
            aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                Found!..,
            </h3>
        </div>
    </div>
    @endforelse

    <div class="col-md-12">

        {{ $ajobs->links('pagination.custom')}}
    </div>

</div>
