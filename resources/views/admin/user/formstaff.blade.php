<section class="home-section">
    <div class="text"><span onclick="showstaffsign();"><i class="fas fa-user-plus"></i> Create account for Staff</span></div>
    <div class="block staff--signup hidden">
        <div class="text-left mt-3 mb-5 staff">
            <div style="display: block;">
                <form action="" class="needs-validation" id="myForm" novalidate>
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm password" name="confirmpswd" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <!-- <div class="row ml-3">
                        <div class="form-group form-check col-xl-3 col-lg-3 col-md-12">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="position" id="position" value="0" required> Quản lý kho
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                        <div class="form-group form-check col-xl-3 col-lg-3 col-md-12">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="position" id="position" value="1" required> Nhân viên bán hàng
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                        <div class="form-group form-check col-xl-3 col-lg-3 col-md-12">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="position" id="position" value="2" required> chưa biết
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                        <div class="form-group form-check col-xl-3 col-lg-3 col-md-12">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="position" id="position" value="3" required> chưa biết
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="position">Vị trí:</label>
                        <select class="form-control" name="position" id="position">
                            <option value="1">Quản lý kho</option>
                            <option value="2">Nhân viên bán hàng</option>
                            <option value="3">Chưa biết</option>
                            <option value="3">Chưa biết</option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>