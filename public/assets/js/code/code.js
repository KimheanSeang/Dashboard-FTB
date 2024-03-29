// #delete
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your data now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

// recover
$(function () {
    $(document).on('click', '#recover', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Recover This Data?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Recover it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Recover!',
                    'Your file has been Recover Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Recover Has been cancelled:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

// approve
$(function () {
    $(document).on('click', '#approve', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Approve This Document?",
            icon: 'warning',
            showCancelButton: true,

            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Approve!',
                    'Your file has been Approve successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Approve Document has been cancelled :)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});


// recover task
$(function () {
    $(document).on('click', '#RecoverTask', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Recover This Task?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Recover it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Recover!',
                    'Task recover has been Recover.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your task recover has been cancelled:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

$(function () {
    $(document).on('click', '#DeleteTask', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Task?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Task has been deleted.',
                    'success'
                );
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'The task now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        });
    });
});


// permanent delete task
$(function () {
    $(document).on('click', '#DeletePermanent', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete Permanent This Task?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Task has been Delete.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Task in trash now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

// delete user
$(function () {
    $(document).on('click', '#deleteuser', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this user?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete is!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'User has been Delete.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'User now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});


// delete permission
$(function () {
    $(document).on('click', '#deletepermission', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this permission?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Permission has been Delete.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'The Permission now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});


// delete role
$(function () {
    $(document).on('click', '#deleterole', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this role?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Role has been Delete.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Role User now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

// delete role and permission
$(function () {
    $(document).on('click', '#deleterolepermission', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this role and permission?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Role and permission has been Delete.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Permission and Role now is safe:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});


// Export Permission
$(function () {
    $(document).on('click', '#export', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Export Permission?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Export it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Permission Export Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Export Permission has cancel:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});



// Approve
$(function () {
    $(document).on('click', '#approveknowledge', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Approve this Chatbot Knowledge?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Chatbot Knowledge approved Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Approve has been cancel:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});



// Approve User
$(function () {
    $(document).on('click', '#approveuser', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Approve this user?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Approve user!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'User Approved Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Approve User now cancel:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});



// Approve Task
$(function () {
    $(document).on('click', '#approvetask', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Approve this Task?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Approve Task!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Task Approved Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Approve task now cancel:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});





// Approve Document
$(function () {
    $(document).on('click', '#approvedoc', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Approve this Document?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delete!',
                    'Document Approved Successfully.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Approve Document now cancel:)',
                    'error'
                );
                setTimeout(() => {
                    Swal.close();
                }, 800);
            }
        })
    });
});

