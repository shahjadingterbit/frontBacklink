<x-base-layout>
<div class="card card-custom">
    <!--begin::Form-->
    <form  action="{{ route('project_logs.store') }}" method="post">
        @csrf
        <input type="hidden" name="project_log_id" value="{{ $data->id }}" id="project_log_id">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <div class="form-group mb-6">
                        <label class="col-form-label text-right">Domain</label>
                        <div class="fv-row">
                            <input type="text" class="form-control"  id="group" value="{{ $data->getDomain->name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2">
                    <div class="form-group mb-6">
                        <label class="col-form-label text-right" for="status">Status</label>
                        <div class="fv-row">
                            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $data->status) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2">
                    <div class="form-group mb-6">
                        <label class="col-form-label text-right" for="location">Location</label>
                        <div class="fv-row">
                        <input type="text" class="form-control autocomplete" id="location" name="location"
                                value="{{ old('location', $data->getLocation?->name) }}">
                        </div>
                    </div>
                </div> 
                @foreach ($groups as $group)
                <div class="col-md-3 col-lg-2">
                    <div class="form-group mb-6">
                        <label class="col-form-label text-right" for="location">{{ $group['name'] }}</label>
                        <div class="fv-row">
                            @if($group['id'] == 1 || $group['id'] == 2 || $group['id'] == 3) 
                                    @php
                                        $GroupTitle= 'Select '. $group['name']; 
                                        $uniqueKey = '';
                                    @endphp
                                    @foreach ($group['records'] as $unique_key => $record)
                                        @if((!empty($selected_project_log_records) && in_array($unique_key, $selected_project_log_records))) 
                                            @php 
                                                $GroupTitle =  implode(' | ', $record); 
                                                $uniqueKey = $unique_key;
                                            @endphp
                                        @endif 
                                    @endforeach
                                    <span  groupID="{{ $group['id'] }}" domainID="{{ $_GET['domain_id'] }}"  class="form-control primaryKeywordList" id="customGroupVlaue_{{ $group['id'] }}" >{{ substr($GroupTitle,0,22) }}</span>
                                    <input type="hidden" value="{{ $uniqueKey }}" name="group[{{ $group['id'] }}]" />
                            @else
                                <select name="group[{{ $group['id'] }}]"  class="form-select form-select-lg fw-bold">
                                    <option value="">Select {{ $group['name'] }}</option>
                                    @foreach ($group['records'] as $unique_key => $record)
                                    <option value="{{ $unique_key }}" <?php echo (!empty($selected_project_log_records) && in_array($unique_key, $selected_project_log_records)) ? 'selected' : ''; ?>>{{ implode(' | ', $record) }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn font-weight-bold btn-primary mr-2" id="heading_details_submit">Update</button>
                    <button type="reset" class="btn font-weight-bold btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
    {{ theme()->getView('pages/projectLog/customGroup/_groupValue') }}
    {{ theme()->getView('pages/projectLog/customGroup/_createGroupValue') }}

</div>
</x-base-layout>
