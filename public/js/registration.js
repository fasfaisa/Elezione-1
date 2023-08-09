$(document).ready(() => {
    const submit = $("#submit-btn");
    $("#reg-voter").click((event) => {
        $("#package").hide();
        $("#payment-msg").hide();
        submit.prop("name", "voter");
        submit.prop("value", "voter");
        $("#reg-voter").addClass("text-blue-600");
        $("#reg-org").removeClass("text-blue-600");
    })
    $("#reg-org").click((event) => {
        $("#package").show();
        $("#payment-msg").show();
        submit.prop("name", "organization");
        submit.prop("value", "organization");
        $("#reg-org").addClass("text-blue-600");
        $("#reg-voter").removeClass("text-blue-600");
    })

    // form submission
    $("#user-form").submit((event) => {
        event.preventDefault();
        let formData = $("#user-form").serialize();
        formData += "&" + $("#submit-btn").prop("name") + "=" +$("#submit-btn").prop("value");

        // start processing animation
        $("#processing-div").removeClass("hidden");
        $("#form-div").addClass("hidden");

        // remove current errors
        for (let i = 0; i < 5; i++) {
            $("#error-span-" + i).text("");
        }
        $("#unsuccessful-div").addClass("hidden");

        $.post("register_process", formData, (data, status) => {
            //console.log("data -> ", data, "\nstatus -> ", status); // this statement help to get idea about response

            // remove processing div
            $("#processing-div").addClass("hidden");

            // show new error
            if (status === "success") {
                if (data !== "success") {
                    $("#form-div").removeClass("hidden");
                    if ([0, 1, 3, 4].includes(parseInt(data))) {
                        $("#error-span-" + data).text("Field is empty");
                    } else if (parseInt(data) === 2) {
                        $("#error-span-2").text("Invalid package type");
                    } else if (parseInt(data) === 5) {
                        $("#error-span-1").text("Invalid email format");
                    } else if (parseInt(data) === 6) {
                        $("#error-span-3").text("Password less than 6 characters");
                    } else if (parseInt(data) === 7) {
                        $("#error-span-4").text("Different password and confirm password");
                    } else if (parseInt(data) === 8) {
                        $("#error-span-1").text("Email already registered");
                    } else {
                        $("#unsuccessful-div").removeClass("hidden");
                    }
                } else {
                    $("#success-div").removeClass("hidden");
                }
            } else {
                $("#form-div").removeClass("hidden");
                $("#unsuccessful-div").removeClass("hidden");
            }
        })
    })
})