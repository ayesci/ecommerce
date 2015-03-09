
// EVENEMENT

//function showCategory()
//{
//    $(this).next('div.product_cat').slideToggle();
//    return false;
//}

//function showListCategory()
//{
//    $('div#list_categories').slideToggle();
//    return false;
//}

function showMenu()
{
    $('div.js-nav-bar').slideDown(200);
}

function hideMenu()
{
    $('div.js-nav-bar').fadeOut(250);
}


$(function ()
{
    //$('.js-category').on('click', showCategory);
    //$('.js-list-category').on('click', showListCategory);
    $('li.product').on('mouseenter', showMenu);
    $('div.js-nav-bar').on('mouseleave', hideMenu);
});


