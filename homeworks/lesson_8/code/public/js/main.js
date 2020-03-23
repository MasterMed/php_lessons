$(document).ready(function () {

    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });

});

// Ох и заморочился я с ним.
$(document).ready(function () {

    let calc = $('.calculator_alt');
    let calcDisplay = calc.find('.calculator__display');
    let calcAction = calc.find('.calculator__action');
    let calcDigit = calc.find('.calculator__digit');
    let calcClear = calc.find('.calculator__clear');
    let calcEqual = calc.find('.calculator__equal');
    let calcSpace = calc.find('.calculator__backspace');
    let firstDigit = null;
    let clearDisplay = null;
    let action = null;

    calcDigit.on('click', function () {
        if (clearDisplay) {
            calcDisplay.val('');
            clearDisplay = null;
        }
        calcDisplay.val(calcDisplay.val() + $(this).attr('value'));
    });

    calcAction.on('click', function () {
        firstDigit = calcDisplay.val();
        action = $(this).attr('value');
        clearDisplay = true;
    });

    calcClear.on('click', function () {
        calcDisplay.val('');
        firstDigit = null;
        action = null;
    });

    calcEqual.on('click', function () {
        if (firstDigit && action) {
            firstDigit = $.ajax({
                type: "POST",
                url: "/calculate/",
                dataType: 'text',
                data: {
                    first: firstDigit,
                    second: calcDisplay.val(),
                    action: action
                }
            }).done(function (data) {
                calcDisplay.val(data);
                return data;
            });
        }
        clearDisplay = true;
    });

    calcSpace.on('click', function () {
        calcDisplay.val(calcDisplay.val().substring(0, calcDisplay.val().length - 1));
    });
    
    //--------------------------------------------------------------------------
    let calc_f = $('.calculator');
    let first_f = calc_f.find("[name='first']");
    let second_f = calc_f.find("[name='second']");
    let action_f = calc_f.find("[name='action']");
    let send_f = calc_f.find("[name='send']");
    let calc_fDisplay = calc_f.find("[name='result']");

    send_f.on('click', function () {        
        $.ajax({
            type: "POST",
            url: "/calculate/",
            dataType: 'text',
            data: {
                first: first_f.val(),
                second: second_f.val(),
                action: action_f.val()
            }
        }).done(function (data) {
            calc_fDisplay.val(data);
        });
    });

    //--------------------------------------------------------------------------
    let calc_s = $('.calculator_second');
    let first_s = calc_s.find("[name='first']");
    let second_s = calc_s.find("[name='second']");
    let calc_sDisplay = calc_s.find("[name='result']");
    
    $("[id^=calc_option]").on('click', function(event) {
        let action = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "/calculate/",
            dataType: 'text',
            data: {
                first: first_s.val(),
                second: second_s.val(),
                action: action
            }
        }).done(function (data) {
            calc_sDisplay.val(data);
        });
    });

});

$(document).ready(function () {
    
    $(".addtocart").on('click', function() {
        let product_id = $(this).data('product');
        $.ajax({
            type: "POST",
            url: "/basket/",
            dataType: 'text',
            data: {
                product_id: product_id
            }
        }).done(function (data) {
            let quant = $('#cart_quant').text();
            quant++;
            $('#cart_quant').text(quant);
        });
    });
    
    $("#checkout").on('click', function() {
        $.ajax({
            type: "POST",
            url: "/basket/checkout/"
        }).done(function (data) {
            alert("Ваш заказ оформлен!");
            window.location.reload();
        });
    }); 
    
    $(".deleteFromBase").on('click', function() {
        if(confirm("Подтвердите удаление")) {
            let button = $(this);
            $.ajax({
                type: "POST",
                url: "/basket/delete/",
                dataType: 'text',
                data: {
                    user_id: button.data('user'),
                    status: button.data('status')
                }
            }).done(function (data) {
                alert(data);
                window.location.reload();
            });
        }        
    });
    
});