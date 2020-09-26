@if ($sortField !== $field)
    <i class="text-muted fas fa-sort"></i>
@elseif ($sortAsc)
    <i class="fas fa-sort-up"></i>
@else
    <i class="fas fa-sort-down"></i>
@endif
