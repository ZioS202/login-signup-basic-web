function validateForm(){
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if(document.getElementById("confirm_password") === null){
        //validate login form
        if (username === "" || password === "") {
            alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
        }
        var allow = /^[a-zA-Z0-9_-]+$/;
        if (!allow.test(username) || !allow.test(password)) {
            alert("Tên đăng nhập và mật khẩu không được chứa ký tự đặc biệt trừ '_' và '-'.");
            return false;
        }
    }else {
        //validate register form
        const confirm_password = document.getElementById("confirm_password").value;
        if (username === "" || password === "" || confirm_password ==="") {
            alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
        }
        var allow = /^[a-zA-Z0-9_-]+$/;
        if (!allow.test(username) || !allow.test(password) ||!allow.test(confirm_password)) {
            alert("Tên đăng nhập và mật khẩu không được chứa ký tự đặc biệt trừ '_' và '-'.");
            return false;
        }
        if(password != confirm_password){
            alert("Mật khẩu xác nhận không khớp.");
            return false;
        }
        if (password.length < 8) {
            alert("Mật khẩu phải có ít nhất 8 ký tự.");
            return false;
        }
    }
    
    return true;
}