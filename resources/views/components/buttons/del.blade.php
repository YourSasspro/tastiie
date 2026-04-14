@props([
    'route' => '',
])

<x-forms.form id="delForm" :action="$route" method="DELETE" style="display: inline-block !important;">
    <button type="submit" class="text-danger" style="background: none; border: none; padding-left: 0;"
        onclick="return confirm('@lang('gen.are_you_sure_delete')')">
        <i class="ti ti-trash"></i>
        <span> @lang('gen.delete') </span>
    </button>
</x-forms.form>
