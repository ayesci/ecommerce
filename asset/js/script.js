
// EVENEMENT

function showCategory()
{
    $(this).next('div.product_cat').slideToggle();
    return false;
}

function showListCategory()
{
    $('div#list_categories').slideToggle();
    return false;
}

$(function ()
{
    $('.js-category').on('click', showCategory);
    $('.js-list-category').on('click', showListCategory);
});


