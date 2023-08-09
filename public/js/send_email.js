$(document).ready(() => {
    $("#contact-form").submit((event) => {
        event.preventDefault();
        const params = {};
        let formData = $("#contact-form").serializeArray();
        $.each(formData, (index, field) => params[field.name] = field.value);

        const serviceID = "service_0hu6itk";
        const templateID = "template_9aq9tys";
        Swal.fire({
            title:"loading..",
            html:'<div class="h-20 w-full overflow-hidden flex items-center justify-center"><span class="material-symbols-outlined text-7xl animate-spin text-sky-600">progress_activity</span></div>',
        });

        emailjs.send(serviceID, templateID, params)
            .then(res => {
                Swal.close();
                $("#name").text("");
                $("#email").text("");
                $("#subject").text("");
                $("#message").text("");
                if (res.status === 200){
                    Swal.fire({
                        icon:"success",
                        text: 'Message delivery successfully!',
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            })
            .catch(err => {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
    })
})
