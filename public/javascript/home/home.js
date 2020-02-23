


$('#qwe').on('click', function () {
   console.log('asd');
});


// $('#in').on('click', function() {
//     console.log('запрос');
//     $.get('/authorization', function(data) {
//         console.log(data);
//         console.log('asd');
//     });
// });


$('#in').on('click', function() {
    console.log('запрос');
    $.ajax({
        url: '/authorization',
        type: 'POST',
        contentType: false,
        processData: false,
        success: function (response) {

            if (response.message) {
                notification('success', {message: response.message});
            }

            if (response.showFields === 'on') {
                $('.form-forgot-password-code').val('');
                $("#form-forgot-password").toggleClass('show-item');
            }

            if (response.redirect) {
                window.location.href = response.redirect
            }

        },
        error: function (response) {
            var responseData = response.responseJSON;
            notification('error', {message: responseData.message});

            if (responseData.hideFields === 'on') {
                $("#form-forgot-password").toggleClass('show-item', false);
                $('.form-forgot-password-code').val('');
            }

            if (responseData.fieldCleanCode === 'on') {
                $('.form-forgot-password-code').val('');
            }

            if (responseData.cleanPassword === 'on') {
                $('.form-forgot-password-password').val('');
            }

            if (responseData.time) {

                var UnixData = responseData.time;
                var textInt = Number(UnixData);
                var intervalTimer = 1000;

                var startIntervalFunction = setInterval(setIntervalData, intervalTimer);

                function setIntervalData() {
                    var minusSecond = --textInt;

                    var dateFormat = moment(minusSecond * 1000).format('mm:ss');

                    if ($("#seconds-counter").hasClass("seconds-counter")) {
                        $('.seconds-counter').text(dateFormat);
                    } else {
                        $('.seconds-counter-timer').text(dateFormat);
                    }

                    if ($('.seconds-counter').text() !== "") {
                        $('.seconds-counter').addClass('seconds-counter-timer');
                        $('.seconds-counter').removeClass('seconds-counter');
                    }

                    if (dateFormat === "00:00") {
                        clearTimeout(startIntervalFunction);
                        $('.seconds-counter-timer').addClass('seconds-counter');
                        $('.seconds-counter-timer').removeClass('seconds-counter-timer');
                    }

                }
            }
        }
    });
});





