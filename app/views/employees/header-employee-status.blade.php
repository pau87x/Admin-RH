<h3 class="page-header">{{ $employee->code }}-{{ $employee->full_name }} 
        @if ($employee->status_id === 1)
        <span class="label label-danger pull-right">{{ $employee->status }}</span>
        @elseif ($employee->status_id === 2)
        <span class="label label-success pull-right">{{ $employee->status }}</span>
        @else
         <span class="label label-default pull-right">{{ $employee->status }}</span>
        @endif
</h3>