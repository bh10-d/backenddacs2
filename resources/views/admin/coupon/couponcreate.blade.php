<section class="home-section">
    <div class="text"><span onclick="showupload();"><i class="fas fa-tags"></i> Tạo mã giảm giá</span></div>
    <div class="block pt-3 uploadpro hidden">
        <form class="needs-validation" id="myForm" novalidate>
            @csrf
            <div class="text-left">
                <div class="row">
                    <div class="form-group col-xl-3">
                        <label for="code">Mã giảm giá:</label>
                        <input type="text" class="form-control" id="code" placeholder="Nhập mã giảm giá" name="code" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group col-xl-9">
                        <label for="namecoupon">Tên mã giảm giá:</label>
                        <input type="text" class="form-control" id="namecoupon" placeholder="Nhập tên mã giảm giá" name="namecoupon" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="condicoupon">Điều kiện chi tiết:</label>
                    <select class="form-control" name="condicoupon" id="condicoupon">
                        <option value="0">Giảm giá theo phần trăm</option>
                        <option value="1">Giảm giá theo số tiền</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="quancoupon">Số lượng mã:</label>
                    <input type="number" class="form-control" id="quancoupon" placeholder="Nhập số lượng" name="quancoupon" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pricecoupon">Số giảm:</label>
                    <input type="number" class="form-control" id="pricecoupon" placeholder="Nhập số giảm" name="pricecoupon" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</section>