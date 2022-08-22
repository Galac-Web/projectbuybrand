const sidebar = {
    id: '#accordionSidebar',
    item: '.nav-item',
    link: '.nav-link',
    collapse: '.collapse-item',
};

$(function () {
    if (!!$(sidebar.id)) {
        $(`${sidebar.id} ${sidebar.link}, ${sidebar.id} ${sidebar.collapse}`).each(function () {
            let href   = $(this).attr('href').replace(location.origin, '').split('/'),
                path   = location.pathname.split('/'),
                action = () => {
                    $(this).siblings('.active').removeClass('active');
                    $(`${sidebar.id} ${sidebar.item}.active`).removeClass('active');
                    $(this).addClass('active').parents(sidebar.item).addClass('active').children(sidebar.link).trigger('click');
                };
            if ((JSON.stringify(href) === JSON.stringify(path)) || (href.length === 2 && path.length === 2 && href[1] === path[1])) {
                action();
                return false;
            }
        });
    }
});