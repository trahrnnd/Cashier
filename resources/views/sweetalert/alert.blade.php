@if (Session::has('success'))
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        })

        ;(async () => {
        await Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
        })
        })()
    </script>
@endif