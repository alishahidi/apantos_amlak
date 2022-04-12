const getWindowHeight = () => window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
const getWindowWidth = () => window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
const getElemId = (id) => document.getElementById(id)
const getElemClassAll = (className) => [...document.querySelectorAll(className)]
const fadeOutEffect = (elem, time = 200) => {
    elem.style.opacity = window.getComputedStyle(elem).getPropertyValue("opacity")
    var last = +new Date()
    const tick = () => {
        elem.style.opacity = +elem.style.opacity - (new Date() - last) / time
        last = +new Date()

        if (+elem.style.opacity >= 0) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, time)
        }
        setTimeout(() => {
            elem.style.display = "none"
        }, time)
    }
    tick()
}
const fadeInEffect = (elem, time = 200, display = "inline-block") => {
    elem.style.opacity = 0
    elem.classList.remove("d-none")
    elem.style.display = display
    var last = +new Date()
    const tick = () => {
        elem.style.opacity = +elem.style.opacity + (new Date() - last) / time
        last = +new Date()
        if (+elem.style.opacity <= 1) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, time)
        }
    }
    tick()
}
const fadeToggleEffect = (elem, time = 200, display = "inline-block") => {
    var currentDisplay = window.getComputedStyle(elem).display
    currentDisplay === "none" ? fadeInEffect(elem, time, display) : fadeOutEffect(elem, time)
}
const openFullscreen = () => {
    var docElem = document.documentElement;
    if (docElem.requestFullscreen) {
        docElem.requestFullscreen();
    } else if (docElem.webkitRequestFullscreen) { /* Safari */
        docElem.webkitRequestFullscreen();
    } else if (docElem.msRequestFullscreen) { /* IE11 */
        docElem.msRequestFullscreen();
    } else if (docElem.mozRequestFullscreen) { /* IE11 */
        docElem.mozRequestFullscreen();
    }
}
const closeFullscreen = () => {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
    } else if (document.mozExitFullscreen) { /* IE11 */
        document.mozExitFullscreen();
    }
}
const toggleFullScreen = () => {
    if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen && !document.msFullScreen)) {
        openFullscreen()
        getElemId("screen-compress").classList.remove("d-none")
        getElemId("screen-expand").classList.add("d-none")
    } else {
        closeFullscreen()
    }

}
const fillWidthElement = (elem, width = 100, timeout = 20) => {
    var elementWidth = (elem.getBoundingClientRect().width / getWindowWidth()) * 100
    var currentValue = Math.floor(elementWidth)
    if (elementWidth !== width && currentValue !== width)
        var effect = setInterval(() => {
            elementWidth < width ? currentValue++ : currentValue--
            elem.style.width = currentValue + '%'
            if (elementWidth < width || currentValue < width) {
                if (currentValue >= width)
                    clearInterval(effect)
            } else {
                if (currentValue <= width)
                    clearInterval(effect)
            }

        }, timeout)
}
getElemId("sidebar-toggle-hide").addEventListener("click", () => {
    var sidebar = getElemId("sidebar")
    var mainBody = getElemId("main-body")
    fadeOutEffect(sidebar)
    fillWidthElement(mainBody)
    setTimeout(() => {
        var toggleHide = getElemId("sidebar-toggle-hide")
        var toggleShow = getElemId("sidebar-toggle-show")
        toggleHide.classList.remove("d-md-inline")
        toggleHide.classList.add("d-none")
        toggleShow.classList.remove("d-inline")
        toggleShow.classList.remove("d-md-none")
        toggleShow.classList.remove("d-none")
    }, 15)
})
getElemId("sidebar-toggle-show").addEventListener("click", () => {
    var sidebar = getElemId("sidebar")
    var mainBody = getElemId("main-body")
    fadeInEffect(sidebar)
    setTimeout(() => {
        var toggleHide = getElemId("sidebar-toggle-hide")
        var toggleShow = getElemId("sidebar-toggle-show")
        toggleHide.classList.remove("d-md-inline")
        toggleHide.classList.remove("d-none")
        toggleShow.classList.remove("d-inline")
        toggleShow.classList.remove("d-md-none")
        toggleShow.classList.add("d-none")
    }, 15)
})
getElemId("sidebar-menu-toggle").addEventListener("click", () => {
    var bodyHeader = getElemId("body-header")
    fadeToggleEffect(bodyHeader, 150, "block")
})
getElemId("search-area-show").addEventListener("click", () => {
    getElemId("search-area-show").classList.remove("d-md-inline")
    var searchArea = getElemId("search-area")
    fadeInEffect(searchArea, 210, "inline")
})
getElemId("search-area-hide").addEventListener("click", () => {
    var searchArea = getElemId("search-area")
    fadeOutEffect(searchArea, 200)
    setTimeout(() => {
        getElemId("search-area-show").classList.add("d-md-inline")
    }, 200)
})
getElemId("header-notification-toggle").addEventListener("click", () => {
    fadeOutEffect(getElemId("header-comment"))
    fadeOutEffect(getElemId("header-profile"))
    fadeToggleEffect(getElemId("header-notification"), 150, "block")
})
getElemId("header-comment-toggle").addEventListener("click", () => {
    fadeOutEffect(getElemId("header-notification"))
    fadeOutEffect(getElemId("header-profile"))
    fadeToggleEffect(getElemId("header-comment"), 150, "block")
})
getElemId("header-profile-toggle").addEventListener("click", () => {
    fadeOutEffect(getElemId("header-comment"))
    fadeOutEffect(getElemId("header-notification"))
    fadeToggleEffect(getElemId("header-profile"), 150, "block")
})
getElemClassAll(".angle-drop-down").map(element => {
    element.addEventListener("click", (elem) => {
        var angle = elem.explicitOriginalTarget
        var groupLink = elem.explicitOriginalTarget.parentNode.parentNode
        groupLink.classList.toggle("sidebar-group-link-active")
        angle.classList.toggle("bi-chevron-left")
        angle.classList.toggle("bi-chevron-down")
    })
})
getElemId("full-screen").addEventListener("click", () => {
    toggleFullScreen()
})
$(document).ready(function () {
    $('.grid-table').DataTable({
        "language": {
            "decimal": "",
            "emptyTable": "داده ای وجود ندارد.",
            "info": "مشاهده _START_ تا _END_ از _TOTAL_ داده",
            "infoEmpty": "مشاهده 0 تا 0 از 0 داده",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "نمایش _MENU_ داده",
            "loadingRecords": "در حال بارگزاری...",
            "processing": "در حال انجام عملیات...",
            "search": "جستجو: ",
            "zeroRecords": "داده ای پیدا نشد.",
            "paginate": {
                "first": "اول",
                "last": "آخر",
                "next": "بعدی",
                "previous": "قبلی"
            },
            "aria": {
                "sortAscending": ": مرتب از کم به زیاد",
                "sortDescending": ": مرتب از زیاد به کم"
            }
        }
    });
});

const deleteAlert = (form, deleteName) => {
    $.confirm({
        title: deleteName,
        content: deleteName,
        type: 'red',
        typeAnimated: true,
        useBootstrap: true,
        draggable: true,
        buttons: {
            delete: {
                text: 'حذف',
                btnClass: 'btn-red',
                action: () => {
                    return true
                }
            },
            close: {
                text: 'بستن',
                btnClass: 'btn-light',
                action: () => {
                    jconfirm.instances[0].close()
                    return false;
                }
            },
        }
    })
}

const uploadFile = target => {
    getElemId("image").alt = "loading";
    getElemId("file-name").innerHTML = target.files[0].name;
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#image')
            .attr('src', e.target.result);
    };
    reader.readAsDataURL(target.files[0]);
}

$(".flatpicker").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});