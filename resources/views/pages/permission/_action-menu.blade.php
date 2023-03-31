<!--begin::Action--->
<td class="text-end">

    <a href ="{{ route('permissions.edit', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Edit
    </a>

    <button data-destroy="{{ route('permissions.destroy', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Delete
    </button>
</td>
<!--end::Action--->
