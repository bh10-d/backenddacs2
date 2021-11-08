<form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="username">Nhap tai khoan:</label><br>
    <input type="text" name="username" placeholder="nhap tai khoan"><br>
    <label for="password">Nhap mat khau:</label><br>
    <input type="text" name="password" placeholder="nhap mat khau"><br>
    <button type="submit">tao tai khoan</button>
</form>