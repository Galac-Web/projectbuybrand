document.addEventListener('DOMContentLoaded', () => {
    $('.all-parameters__select').select2({
        minimumResultsForSearch: Infinity
    });
    $('.select__item').select2({
        minimumResultsForSearch: Infinity
    });
    $('.doubt__select').select2({
        minimumResultsForSearch: Infinity
    });
    $('.header__language').select2({
        minimumResultsForSearch: Infinity
    });

    $(".graph-settings__range").ionRangeSlider({
        hide_min_max: true,
        hide_from_to: true,
        min: 0,
        max: 100,
        // onChange: function (data) {
        //     $('.input-slider-value').val(data.from);
        // },
    });

    $(".filters__range").ionRangeSlider({
        min: 0,
        max: 100,
        type: "double",
        // onChange: function (data) {
        //     $('.input-slider-value').val(data.from);
        // },
    });


    /* ticker */

    let tickerItems = document.querySelectorAll('.ticker__item');
    let tickerWidth = 0;

    tickerItems.forEach(item => {
        tickerWidth += item.offsetWidth;
    })
    // console.log(tickerWidth)


    /* swiper */


    new Swiper('.swiper-catalog', {
        slidesPerView: 6,
        spaceBetween: 16,
        navigation: {
            nextEl: '.swiper-catalog-next',
            prevEl: '.swiper-catalog-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
            1200: {
                slidesPerView: 6,
            }
        }
    });

    new Swiper('.slider-new-franchises', {
        slidesPerView: 4,
        spaceBetween: 16,
        navigation: {
            nextEl: '.slider-new-franchises-next',
            prevEl: '.slider-new-franchises-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });

    new Swiper('.community-slider', {
        slidesPerView: 2,
        slidesPerColumn: 2,
        spaceBetween: 16,
        slidesPerGroup: 2,
        grid: {
            rows: 3,
            fill: 'row',
        },
        navigation: {
            nextEl: '.community-slider-next',
            prevEl: '.community-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
        }
    });

    new Swiper('.swiper-services-center', {
        slidesPerView: 6,
        spaceBetween: 16,
        navigation: {
            nextEl: '.swiper-services-center-next',
            prevEl: '.swiper-services-center-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
            1200: {
                slidesPerView: 6,
            }
        }
    });

    new Swiper('.media__slider', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.media-arrow-next',
            prevEl: '.media-arrow-prev',
        },
    });

    new Swiper('.videos-slider', {
        slidesPerView: 3,
        spaceBetween: 40,
        navigation: {
            nextEl: '.videos-slider-next',
            prevEl: '.videos-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                spaceBetween: 20,
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1200: {
                spaceBetween: 40,
            }
        }
    })

    new Swiper('.videos-slider-grid', {
        slidesPerView: 3,
        spaceBetween: 40,
        grid: {
            rows: 2,
            fill: 'row',
        },
        navigation: {
            nextEl: '.videos-slider-grid-next',
            prevEl: '.videos-slider-grid-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            768: {
                spaceBetween: 20,
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1200: {
                spaceBetween: 40,
            }
        }
    })
    /*
        navigation: {
            nextEl: '.videos-slider-next',
                prevEl: '.videos-slider-prev',
        },
        // breakpoints: {
        //     0: {
        //         slidesPerView: 1,
        //     },
        //     768: {
        //         spaceBetween: 20,
        //         slidesPerView: 2,
        //     },
        //     992: {
        //         slidesPerView: 3,
        //         spaceBetween: 25,
        //     },
        //     1200: {
        //         spaceBetween: 40,
        //     }
        // }*/
    let analyticsSwiper = new Swiper('.analytics-swiper', {
        slidesPerView: 1,
        autoHeight: true,
    });

    new Swiper('.swiper-nav-slider', {
        slidesPerView: 4,
        spaceBetween: 16,
    });

    new Swiper('.ticker-slider', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        centeredSlides: true,
        speed: 2500,
        autoplay: {
            delay: 1,
        },
        loop: true,
        allowTouchMove: false,
        disableOnInteraction: true
    });

    new Swiper('.content-slider', {
        slidesPerView: 3,
        navigation: {
            nextEl: '.content-slider-next',
            prevEl: '.content-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });

    new Swiper('.smalltown-slider', {
        slidesPerView: 3,
        navigation: {
            nextEl: '.smalltown-slider-next',
            prevEl: '.smalltown-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });

    new Swiper('.topics-slider', {
        slidesPerView: 3,
        navigation: {
            nextEl: '.topics-slider-next',
            prevEl: '.topics-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });

    new Swiper('.case-slider', {
        slidesPerView: 3,
        navigation: {
            nextEl: '.case-slider-next',
            prevEl: '.case-slider-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });

    new Swiper('.related-materials-swiper', {
        slidesPerView: 'auto',
        spaceBetween: 32,
        scrollbar: {
            el: ".swiper-scrollbar",
            hide: true,
            draggable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 'auto',
            },
        }
    });


    function resetSliderBtn() {
        let allBtns = document.querySelectorAll('.analytics__item');

        allBtns.forEach(btn => {
            btn.classList.remove('active');
        })
    }

    function setBtnActive(btn) {
        btn.classList.add('active');
        window.scrollTo({
            top: 170,
            behavior: "smooth"
        });
    }

    /* buttons switch swiper slide */

    if (document.querySelector('.analytics-swiper')) {
        const sliderOne = document.querySelector('.slider-1'),
            sliderTwo = document.querySelector('.slider-2'),
            sliderThree = document.querySelector('.slider-3'),
            sliderFour = document.querySelector('.slider-4');

        sliderOne.addEventListener('click', () => {
            resetSliderBtn();
            setBtnActive(sliderOne);
            analyticsSwiper.slideTo(0);
        })

        sliderTwo.addEventListener('click', () => {
            resetSliderBtn();
            setBtnActive(sliderTwo);
            analyticsSwiper.slideTo(1);
        })

        sliderThree.addEventListener('click', () => {
            resetSliderBtn();
            setBtnActive(sliderThree);
            analyticsSwiper.slideTo(2);
        })

        sliderFour.addEventListener('click', () => {
            resetSliderBtn();
            setBtnActive(sliderFour);
            analyticsSwiper.slideTo(3);
        })
    }


    /* tabs */

    const tabs = document.querySelectorAll(' [data-tab-target]');

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            const tabContents = this.closest(".tabs-wrapper").querySelectorAll(
                    "[data-tab-content]"
                ),
                childrenTabs = this.closest(".tabs-wrapper").querySelectorAll(
                    "[data-tab-target]"
                ),
                target = document.querySelector(tab.dataset.tabTarget);

            tabContents.forEach((content) => {
                content.classList.remove("active");
            });
            childrenTabs.forEach((tab) => {
                tab.classList.remove("active");
            });

            tab.classList.add("active");
            target.classList.add("active");
        });
    })

    /* open filters */

    const parametersBtn = document.querySelector('.all-parameters'),
        filterList = document.querySelector('.filters')

    if (parametersBtn != undefined) {
        parametersBtn.addEventListener('click', function (e) {
            e.preventDefault();

            this.classList.toggle('open');

            if (this.classList.contains('open')) {
                filterList.classList.remove('filters--hidden')
            } else {
                filterList.classList.add('filters--hidden')
            }
        })
    }

    /* open mobile menu */

    const mobMenu = document.querySelector('.mob-menu');

    document.querySelector('.menu__button').addEventListener('click', function (e) {
        e.preventDefault();

        this.classList.toggle('open')

        mobMenu.classList.toggle('open');

        if (mobMenu.classList.contains('open')) {
            document.body.classList.add('overflow-hidden')
        } else {
            document.body.classList.remove('overflow-hidden')
        }
    })

    /* accordions */

    const accordionBtns = document.querySelectorAll('.mob-menu__section'),
        accordionItem = document.querySelectorAll('.mob-menu__box');

    accordionBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if (btn.parentElement.classList.contains('open')) {
                btn.parentElement.classList.remove('open')
            } else {
                accordionItem.forEach(item => {
                    item.classList.remove('open')
                })
                btn.parentElement.classList.add('open')
            }
        })
    })

    const accordions = document.querySelectorAll('.accordion__item');
    accordions.forEach(accordion => {
        accordion.addEventListener('click', function (e) {
            e.preventDefault();
            const item = this.closest('.accordion'),
                content = item.querySelector('.accordion__content');

            if (item.classList.contains('accordion--active')) {
                item.classList.remove('accordion--active');
                content.style.maxHeight = null;
            } else {
                item.classList.add('accordion--active');
                content.style.maxHeight = content.scrollHeight + 'px';
            }
        })
    })


    /* open notification */

    const notificationExpandButtons = document.querySelectorAll('.expandNotification');

    notificationExpandButtons.forEach(button => {
        button.addEventListener('click', function () {
            const parent = this.closest('.notification');

            if (parent.classList.contains('open')) {
                parent.classList.remove('open');
            } else {
                parent.classList.add('open');
            }
        })
    })

    /* scrollbar styling plugin */
    const container = document.querySelector('.scrolling-el');
    if (container != undefined) {
        const ps = new PerfectScrollbar(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
    }

    /* right sidebar open */


    const openNotificationList = document.querySelector('.openNotificationList');
    if (openNotificationList != undefined) {
        openNotificationList.addEventListener('click', function () {
            document.querySelector('.notificationList').classList.add('show');
            this.classList.add('active');
        })
    }


    /*notificationList.addEventListener('mouseenter', () => {
        document.body.classList.add('overflow-hidden')
    })

    notificationList.addEventListener('mouseleave', () => {
        document.body.classList.remove('overflow-hidden')
    })*/

    const rightSidebarCloseButton = document.querySelector('.right-sidebar__close');

    if (rightSidebarCloseButton != undefined) {
        rightSidebarCloseButton.addEventListener('click', () => {
            const sidebarLists = document.querySelectorAll('.right-sidebar__info');
            const notificationItems = document.querySelectorAll('.right-sidebar__item')

            sidebarLists.forEach(list => {
                list.classList.remove('show');
            })
            notificationItems.forEach(item => {
                item.classList.remove('active');
            })
        })
    }

    $(".phone-mask").mask("+7 (999) 999-9999");

    const helpCenterBlock = document.querySelector('.help-center-list__inner'),
        helpCenterWrapper = document.querySelector('.help-center-list__wrapper'),
        bottomButton = document.querySelector('.js-help-btn-bottom');

    if (helpCenterBlock != undefined) {
        helpCenterBlock.onscroll = function () {
            let totalBlockHeight = helpCenterBlock.scrollHeight;
            let scrollPoint = helpCenterBlock.scrollTop + helpCenterWrapper.scrollHeight;

            if (scrollPoint >= totalBlockHeight) {
                bottomButton.classList.add('hidden')
            } else {
                bottomButton.classList.remove('hidden')
            }
        }

        if (bottomButton != undefined) {
            bottomButton.addEventListener('click', (e) => {
                helpCenterBlock.scrollTop = helpCenterBlock.scrollHeight;
            })
        }
    }

    const actionInputs = document.querySelectorAll('.jsInput');

    actionInputs.forEach((input) => {
        const parent = input.parentNode;

        input.addEventListener('input', e => {
            parent.classList.add('focus');

            if (input.type === 'password') {
                if (input.value !== '') {
                    parent.classList.add('password');
                } else {
                    parent.classList.remove('password');
                }
            }

            showPass(input, parent);

        })
        input.addEventListener('blur', e => {
            const value = input.value.trim();
            if (value === '') {
                parent.classList.remove('focus');
            }
        })
    })

    function showPass(input, parent) {
        const showPassButton = parent.querySelector('.jsShowPass');
        const hidePassButton = parent.querySelector('.jsHidePass');

        if (showPassButton && hidePassButton != undefined) {
            showPassButton.addEventListener('click', e => {
                e.preventDefault();
                input.type = 'text';
                e.target.classList.remove('visible')
                hidePassButton.classList.add('visible')
            })
            hidePassButton.addEventListener('click', e => {
                e.preventDefault();
                input.type = 'password';
                e.target.classList.remove('visible')
                showPassButton.classList.add('visible')
            })
        }
    }

    $('.floating-control').select2({
        minimumResultsForSearch: Infinity,
        placeholder: ''
    });

    $('.floating-control').on('focus', function (e) {
        $(this).parents('.floating-group').addClass('focused');
    }).on('blur', function () {
        if ($(this).val().length > 0) {
            $(this).parents('.floating-group').addClass('focused');
        } else {
            $(this).parents('.floating-group').removeClass('focused');
        }
    });
    $('.floating-control').on('change', function (e) {
        if ($(this).is('select')) {
            if ($(this).val() === $("option:first", $(this)).val()) {
                $(this).parents('.floating-group').removeClass('focused');
            } else {
                $(this).parents('.floating-group').addClass('focused');
            }
        }
    })

    const overlay = document.querySelector('.overlay'),
        modal = document.querySelector('.modal');

    if (modal != undefined) {
        overlay.addEventListener('click', () => {
            modal.classList.remove('open');
            overlay.classList.remove('show');
        })
    }

    // watchSlidesProgress: true,


    let gallerySwiperThumbs = new Swiper(".gallery-slider-thumbs", {
        spaceBetween: 16,
        slidesPerView: 6,
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 5,
            },
            992: {
                slidesPerView: 6,
            }
        }
    });

    let gallerySwiper = new Swiper(".gallery-slider-main", {
        slidesPerView: 1,
        thumbs: {
            swiper: gallerySwiperThumbs,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });


    const expandButtonPartnerSupport = document.querySelector('.jsExpandButtonPartner');

    if (expandButtonPartnerSupport != undefined) {
        const expandButtonArrowPartnerSupport = expandButtonPartnerSupport.querySelector('.expand-button__icon'),
            partnerSupportContainer = document.querySelector('.partner-support__container');

        expandButtonPartnerSupport.addEventListener('click', e => {
            if (!partnerSupportContainer.classList.contains('show')) {
                partnerSupportContainer.classList.add('show');
                expandButtonArrowPartnerSupport.classList.add('active');
                expandButtonPartnerSupport.querySelector('.expand-button__text').textContent = "Свернуть"
            } else {
                partnerSupportContainer.classList.remove('show');
                expandButtonArrowPartnerSupport.classList.remove('active');
                expandButtonPartnerSupport.querySelector('.expand-button__text').textContent = "Все меры поддержки и обучения"
            }
        })
    }




    let communicationSwiper = new Swiper(".communication-slider", {
        slidesPerView: 1,
        navigation: {
            nextEl: ".communication-slider-next",
            prevEl: ".communication-slider-prev",
        }
    });

    let filtersSlider = new Swiper(".filters-slider", {
        slidesPerView: 'auto',
        spaceBetween: 16,
        navigation: {
            nextEl: ".filters-slider-next",
            prevEl: ".filters-slider-prev"
        }
    })

    let expertsSlider = new Swiper(".experts__slider", {
        slidesPerView: '1',
        navigation: {
            nextEl: ".experts-slider-next",
            prevEl: ".experts-slider-prev",
        }
    })

    const buttonDetails = document.querySelector('.jsButtonDetails'),
        buttonDetailsInfoClose = document.querySelector('.jsButtonDetailsClose'),
        detailsInfo = document.querySelector('.place-ranking__details');

    if (buttonDetails != undefined) {
        buttonDetails.addEventListener('click', e => {
            e.preventDefault();
            buttonDetails.classList.toggle('active');
            detailsInfo.classList.toggle('show');
        })

        buttonDetailsInfoClose.addEventListener('click', e => {
            e.preventDefault();
            buttonDetails.classList.remove('active');
            detailsInfo.classList.toggle('show');
        })
    }

})
