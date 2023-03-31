<div class="input-group mb-3 search-loc">
  <input type="text" class="form-control" id="selectInputGroupValue" value="Please select value" aria-label="Search Location" aria-describedby="basic-addon2" disabled>
  <input type="hidden" id="selectHiddenInputGroupValue" name="group[{{ $customArray['group_id']}}]" value="0" >
</div>
<div class="input-group mb-3 search-loc">
  <input type="text" class="form-control" id="searchBarforGroupValue" placeholder="Search" aria-label="Search Location" aria-describedby="basic-addon2">
</div>
<div class="tow-loc-listing">
    <ul class="list-group list-group-flush">
        @if(!empty($groupHeading))
            @php 
                $valueUsed = 0;
                $selectedGroupRecodeValue = 0;
                if(!empty($selectedGroupRecode[0]['unique_row_num'])) {
                    $selectedGroupRecodeValue = $selectedGroupRecode[0]['unique_row_num'];
                }
            @endphp
            @foreach($groupHeading as $heading)
                <li class="listofGroupValue list-group-item list-group-item-action {{ !empty($totalUsedValue[$heading['unique_row_num']])?'usedValueOfGroup':'notUsedvalueOfGroup' }} {{ ($heading['unique_row_num'] == $selectedGroupRecodeValue) ? 'selectedGroupValue active' : ''; }}" unique_row_num="{{ $heading['unique_row_num'] }}"  UsedGroupValue="{{ !empty($totalUsedValue[$heading['unique_row_num']])?$totalUsedValue[$heading['unique_row_num']]:'0' }}" groupValueName="{{ $heading['data'] }}">{{ $heading['data'] }}
                    @if(!empty($totalUsedValue[$heading['unique_row_num']]))
                        <span>{{ $totalUsedValue[$heading['unique_row_num']] }}</span>
                    @endif
                </li>
            @endforeach
                <li class="list-group-item list-group-item-action hide" id="hideIfNoRecordExist">No match found</li>
        @endif
    </ul>    
</div>