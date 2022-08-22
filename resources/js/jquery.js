import translation from './config';
import Inputmask from "inputmask";

require('./select2');
require('jquery-countdown');
require('@chenfengyuan/datepicker');
require('@chenfengyuan/datepicker/i18n/datepicker.ru-RU');

const mask = {
    phone: {
        alias: '+7 (999) 999-9999'
    },
    date: {
        format: 'dd.mm.yyyy',
        placeholder: '_',
    },
    time: {
        format: 'HH:MM',
        hourFormat: "24",
        placeholder: '_',
    },
}

$(function () {
    $('a[href="#"]').on('click', false);

    $('.dropdown-menu').on('click', function(e){
        e.stopPropagation();
    });

    if ($('[data-countdown]').exists()) {
        $('[data-countdown]').each(function () {
            $(this).countdown($(this).data('countdown'))
                .on('update.countdown', function (e) {
                    var format = '%H ч. %M мин.';
                    if (e.offset.totalDays > 0) {
                        format = '%d дн. ' + format;
                    }
                    if (e.offset.weeks > 0) {
                        format = '%-w нед. ' + format;
                    }

                    $(this).html(e.strftime(format));
                })
                .on('finish.countdown', function () {
                    $(this).html(translation.countdown.finish);
                });
        });
    }

    if ($('[data-countdown-time]').exists()) {
        $('[data-countdown-time]').each(function () {
            $(this).countdown($(this).data('countdown-time'))
                .on('update.countdown', function (e) {
                    let fix = n => n < 10 ? '0' + n : n;
                    let timer = `${ fix(e.offset.totalHours) }:${ fix(e.offset.minutes) }:${ fix(e.offset.seconds) }`;

                    $(this).html(timer);
                })
                .on('finish.countdown', function () {
                    $(this).html(translation.countdown.finish);
                });
        });
    }

    if ($('[data-type="phone"]').exists()) {
        for (let phone of $('[data-type="phone"]')) {
            new Inputmask({alias: mask.phone.alias}).mask(phone);
        }
    }

    if ($('[data-type="time"]').exists()) {
        for (let time of $('[data-type="time"]')) {
            new Inputmask({alias: 'datetime', inputFormat: mask.time.format, hourFormat: mask.time.hourFormat, max: '24:00', placeholder: mask.time.format.replace(/[a-zA-Z]/g, mask.time.placeholder)}).mask(time);
        }
    }

    if ($('[data-type="birthday"]').exists()) {
        for (let birthday of $('[data-type="birthday"]')) {
            $(birthday).datepicker({
                autoHide: true,
                language: app.language.replace('_', '-'),
                format: mask.date.format,
                endDate: new Date(),
            });
            Inputmask({alias: "datetime", inputFormat: mask.date.format, placeholder: mask.date.format.replace(/[a-zA-Z]/g, mask.date.placeholder)}).mask(birthday);
        }
    }
});