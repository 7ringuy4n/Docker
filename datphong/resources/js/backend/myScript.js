$(document).ready(function() {
    let $btnSearch = $('button#btn-search');
    let $btnClearSearch = $('button#btn-clear-search');
    let $inputSearchField = $('input[name=search_field]');
    let $inputSearchValue = $('input[name=search_value]');
    let $statusAjax = $('button.status-ajax');
    let $bccContactAjax = $('button.bcc_contact-ajax');
    let $categoryName = $('input[name=name]');
    let $categorySlug = $('input[name=slug]');
    let $slugVI = $("input[name='vi[name]']");
    let $slugEN = $("input[name='en[name]']");
    let $selectAttr = $('select.select-ajax');
    let $selectFilter = $('select[name = select_filter]');
    let $priceFormat = $('input.currency');
    let $inputOrdering = $('input.input-ordering');
    let $fieldAjax = $('.field-ajax');
    let $removeImage = $('.dz-remove');

    let categoryTree = $('#nestable-category');

    categoryTree
        .nestable({
            /* config options */
        })
        .on('change', function() {
            let dataSend = categoryTree.nestable('serialize');
            $.ajax({
                type: 'POST',
                url: categoryTree.data('url'),
                data: {
                    data: dataSend,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                },
            });
        });

    // Star rating
    $('.zvn-rating').rating({
        showClear: false,
        step: 1,
        min: 0,
        max: 5,
        starCaptions: function(val) {
            return val;
        },
    });

    $('.zvn-rating-show').rating({
        displayOnly: true,
        showClear: false,
        showCaption: false,
        step: 1,
        min: 0,
        max: 5,
        size: 'xs'
    });

    // Init select2
    $('.select-multi').select2();

    // Select field
    $('a.select-field').click(function(e) {
        e.preventDefault();
        let field = $(this).data('field');
        let fieldName = $(this).html();
        $('button.btn-active-field').html(
            fieldName + ' <span class="caret"></span>'
        );
        $inputSearchField.val(field);
    });

    /* Search */
    $btnSearch.click(function() {
        var pathname = window.location.pathname;
        let params = ['filter_status'];
        let searchParams = new URLSearchParams(window.location.search); // ?filter_status=active

        let link = '';
        $.each(params, function(key, param) {
            // filter_status
            if (searchParams.has(param)) {
                link += param + '=' + searchParams.get(param) + '&'; // filter_status=active
            }
        });

        let search_field = $inputSearchField.val();
        let search_value = $inputSearchValue.val();

        if (search_value.replace(/\s/g, '') == '') {
            alert('Nhập vào giá trị cần tìm !');
        } else {
            window.location.href =
                pathname +
                '?' +
                link +
                'search_field=' +
                search_field +
                '&search_value=' +
                search_value;
        }
    });

    /* Filter status */
    $btnClearSearch.click(function() {
        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);

        params = ['filter_status'];

        let link = '';
        $.each(params, function(key, param) {
            if (searchParams.has(param)) {
                link += param + '=' + searchParams.get(param) + '&';
            }
        });

        window.location.href = pathname + '?' + link.slice(0, -1);
    });

    /* Confirm delete */
    $('.btn-delete').on('click', function() {
        if (!confirm('Bạn có chắc muốn xóa phần tử?')) return false;
    });

    /* Change status */
    $statusAjax.on('click', function() {
        let link = $(this).data('link');
        let $selector = $(this);
        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                if (result.status) {
                    if (result.response === 'active')
                        $selector
                            .removeClass('btn-info')
                            .addClass('btn-success')
                            .text('Active')
                            .data('link', result.link);
                    else
                        $selector
                            .removeClass('btn-success')
                            .addClass('btn-info')
                            .text('Inactive')
                            .data('link', result.link);
                    $selector.notify('Cập nhật thành công!', {
                        className: 'success',
                        autoHideDelay: 1500,
                        elementPosition: 'top left',
                    });
                } else {
                    console.log(result.error);
                }
            },
        });
    });

    /* Change Bcc contact */
    $bccContactAjax.on('click', function() {
        let link = $(this).data('link');
        let $selector = $(this);
        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                if (result.status) {
                    if (result.response === 'active')
                        $selector
                            .removeClass('btn-warning')
                            .addClass('btn-primary')
                            .text('Bật')
                            .data('link', result.link);
                    else
                        $selector
                            .removeClass('btn-primary')
                            .addClass('btn-warning')
                            .text('Tắt')
                            .data('link', result.link);
                    $selector.notify('Cập nhật thành công!', {
                        className: 'success',
                        autoHideDelay: 1500,
                        elementPosition: 'top left',
                    });
                } else {
                    console.log(result.error);
                }
            },
        });
    });

    /* Create slug of category */
    $categoryName.on('change', function() {
        let categoryName = $(this).val();
        if ($categorySlug.val() === '')
            $categorySlug.val(to_slug(categoryName));
    });

    $slugVI.on('change', function() {
        let value = $('input[name="vi[name]"]').val();
        let $selector = $('input[name="vi[slug]"]');
        if ($selector.val() === '') $selector.val(to_slug(value));
    });

    $slugEN.on('change', function() {
        let value = $('input[name="en[name]"]').val();
        let $selector = $('input[name="en[slug]"]');
        if ($selector.val() === '') $selector.val(to_slug(value));
    });

    /* Upload image */
    $('.lfm').filemanager('image');

    /* Init datepicker */
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
    });

    /* Change attr select box */
    $selectAttr.on('change', function() {
        let url = $(this).data('url');
        let field = $(this).data('field');
        let value = $(this).val();
        let $selector = $(this);
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                field: field,
                value: value,
            },
            dataType: 'json',
            success: function(result) {
                if (result.status) {
                    $selector.notify('Cập nhật thành công!', {
                        className: 'success',
                        autoHideDelay: 1500,
                        elementPosition: 'top left',
                    });
                } else {
                    console.log(result.error);
                }
            },
        });
    });

    $fieldAjax.on('change', function(e) {
        let value = $(this).val();
        let field = $(this).data('field');
        let link = $(this).data('link');
        let $selector = $(this);
        $.ajax({
            url: link,
            type: 'GET',
            data: {
                field: field,
                value: value,
            },
            dataType: 'json',
            success: function(result) {
                if (result.status) {
                    $selector.notify('Cập nhật thành công!', {
                        className: 'success',
                        autoHideDelay: 1500,
                        elementPosition: 'top left',
                    });
                } else {
                    console.log(result.error);
                }
            },
        });
    });

    $selectFilter.on('change', function() {
        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);

        params = ['page', 'filter_status', 'search_field', 'search_value'];

        let link = '';
        $.each(params, function(key, value) {
            if (searchParams.has(value)) {
                link += value + '=' + searchParams.get(value) + '&';
            }
        });
        let select_field = $(this).data('field');
        let select_value = $(this).val();
        if (link === '')
            window.location.href =
                pathname +
                '?select_field=' +
                select_field +
                '&select_value=' +
                select_value;
        else
            window.location.href =
                pathname +
                '?' +
                link.slice(0, -1) +
                '&select_field=' +
                select_field +
                '&select_value=' +
                select_value;
    });

    /* Format currency */
    $priceFormat.simpleMoneyFormat();

    /* Hide alert */
    $('.alert')
        .delay(2500)
        .hide(1000);

    /* Checkbox ordering */
    $inputOrdering.on('change', function() {
        let id = $(this).data('id');
        let $selector = $('input[name="cid[' + id + ']"]');
        $selector.attr('checked', true);
        $selector.parent().addClass('checked');
        $selector
            .parent()
            .parent()
            .addClass('selected');
    });

    $removeImage.on('click', function() {
        let file = $(this).data('file');
        $('.dz-preview[data-file="' + file + '"]').remove();
        $('.image-hidden[data-file="' + file + '"]').remove();
    });
});

function to_slug(str) {
    str = str.toLowerCase();
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');
    str = str.replace(/([^0-9a-z-\s])/g, '');
    str = str.replace(/(\s+)/g, '-');
    str = str.replace(/^-+/g, '');
    str = str.replace(/-+$/g, '');
    return str;
}
