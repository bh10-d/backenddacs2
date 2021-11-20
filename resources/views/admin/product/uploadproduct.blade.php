<section class="home-section">
        <div class="text"><span onclick="showupload();"><i class="far fa-folder-open"></i> Upload Products</span></div>
        <div class="block pt-3 uploadpro hidden">
            <form action="{{ route('product') }}" class="needs-validation" id="myForm" novalidate>
                @csrf
                <div class="text-left">
                    <div class="row">
                        <div class="form-group col-xl-2">
                            <label for="code">Mã sản phẩm:</label>
                            <input type="text" class="form-control" id="code" placeholder="Enter Code product" name="code" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-xl-10">
                            <label for="pname">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter name" name="pname" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pcate">Thể loại:</label>
                        <select class="form-control" name="pcate" id="pcate">
                            <option value="1">Điện thoại</option>
                            <option value="2">Máy tính</option>
                            <option value="3">Phụ kiện</option>
                            <!-- <option value="4">4</option>
                            <option value="5">5</option> -->
                        </select>
                        <!-- <input type="text" class="form-control" id="pcate" placeholder="Enter category" name="pcate" required> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pprice">Gia :</label>
                        <input type="number" class="form-control" id="pprice" placeholder="Enter price" name="pprice" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="form-group">
                        <label for="pquan">Số lượng:</label>
                        <input type="number" class="form-control" id="pquan" placeholder="Enter quantity" name="pquan" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="form-group">
                        <label for="pimg">Hình ảnh:</label>
                        <input type="file" class="form-control-file border" id="pimg" placeholder="Enter image" name="pimg" multiple required>
                        <span id="error_multiple_files"></span>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <!-- sua ckeditor -->

                    <div class="form-group">
                        <label for="editor">Mô tả:</label>
                        <!-- <div id="editor"></div> -->
                        <textarea class="form-control" rows="5" id="editor" placeholder="Enter details" name="pdetail" required></textarea>
                        <!-- <input type="text" class="form-control" id="editor" placeholder="Enter details" name="pdetail" required> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>