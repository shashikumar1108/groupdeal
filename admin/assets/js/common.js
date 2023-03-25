let token = localStorage.getItem('access_token');
console.log("Token : ",token);
console.log("Base url : ",base_url)
if( token == null ){
    window.location.href = base_url+'login'
}

let timeout;

function logout() {

    Swal.fire({
        title: 'Are you sure want to logout?',
        text: '',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            localStorage.clear();
            Swal.fire('Logged out successfully');
            timeout = setTimeout(reloadPage, 2000)
        }
    });

    // localStorage.clear();
    // alert('Logged out successfully');
    // timeout = setTimeout(reloadPage, 1000)
}

function forceLogout() {
    localStorage.clear();
    //Swal.fire('Logged out successfully');
    timeout = setTimeout(reloadPage, 2000)
}

function reloadPage() {
    window.location.reload()
}

function tokenExpired(){
    localStorage.clear();
    alert('Token expired please login!!!')
    timeout = setTimeout(reloadPage, 1000)
}