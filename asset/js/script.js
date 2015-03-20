
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

function replaceSource()
{
    var source = $(this).attr('src');
    $('div.img_icon img').attr('src', source);
}

function showAvis()
{
    $('div.all_comm').fadeToggle(250);
}

function changePrice()
{
    //console.log(this);
    $(this).submit();
}

function article_exists()
{
    var id = this.dataset.id;
    var config = {
        url : base_url+"index.php/panier/article_exist/"+id
    };
    $.ajax(config).done(showMessage);

    console.log(config);
}

function showMessage(data)
{
    if(data == "true")
    {
        $('div.js-show-message').fadeIn(150);
    }
    else
    {
        var redirect_url = $('.js-redirect').attr('href');
        window.location =redirect_url ;

    }
}

function hideMessage()
{
    $('div.js-show-message').fadeOut(100);
}

function onClickCheckbox()
{
    $('.js-facturation').fadeToggle(100);
}

$(function ()
{
    //$('.js-category').on('click', showCategory);
    //$('.js-list-category').on('click', showListCategory);
    $('div.navigation-product').on('mouseenter', showMenu);
    $('div.js-nav-bar').on('mouseleave', hideMenu);
    $('div.img_carousel img').on('click', replaceSource);
    $('div.avis').on('click', showAvis);
    $('form.quantity').on('change', changePrice);
    $('a.js-add-panier').on('click', article_exists);
    $('button.js-hide-message').on('click', hideMessage);
    $('input.address').on('change', onClickCheckbox);

});


