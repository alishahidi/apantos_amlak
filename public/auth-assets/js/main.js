// const Toast = Swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 4000,
//     timerProgressBar: true,
//     didOpen: (toast) => {
//         toast.addEventListener('mouseenter', Swal.stopTimer)
//         toast.addEventListener('mouseleave', Swal.resumeTimer)
//     }
// })

const uploadFile = target => {
    document.getElementById("image").alt = "loading";
    document.getElementById("image").style.height = "150px";
    document.getElementById("image").style.width = "150px";
    document.getElementById("file-name").innerHTML = target.files[0].name;
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("image").src = e.target.result;
    };
    reader.readAsDataURL(target.files[0]);
}
