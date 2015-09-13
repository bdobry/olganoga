$(document).ready(function () {
    var e = $("#form"),
        t = $(".submit"),
        n = $(".hello");
    e.on("submit", function (a) {
        console.log("inside submit"),
            a.preventDefault(), $.ajax({
                url: "",
                type: "POST",
                dataType: "html",
                data: e.serialize(),
                beforeSend: function () {
                    //n.fadeOut(),
                    $("input.submit").text("Wysyłanie...");
                },
                success: function (a) {
                    var data = $.parseJSON(a);
                    n.html(data.info).fadeIn(),
                        t.html("Wyślij wiadomość")
                    if (data.success == true) {
                        console.log(data.text),
                            $('h2 span').html(data.text);
                        $("div.hello").attr('class', 'hello success');
                        form.trigger('reset');
                    } else {
                        $("div.hello").attr('class', 'hello alert');
                    }
                },
                error: function (e) {
                    console.log(e)
                }
            })
    })
});
