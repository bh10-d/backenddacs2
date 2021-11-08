<h1>List danh sach</h1>

@foreach($staffs as $staff)
<div>
    {{ $staff->username }}
    {{ $staff->password }}
</div>
@endforeach
<div>
    {{ $staffs->links() }}
</div>