var form = $('.form');
var btn = $('#submit');
var topbar = $('.topbar');
var input = $('#password');
var article =$('.article');
var tries = 0;
var h = input.height();

$('.spanColor').height(h+23);

$('#findpass').on('click',function()
{
    $(this).text('hello');
});

function openPopup() 
{
    document.getElementById('login-popup').style.display = 'block';
}

function getStatus() 
{
    if(loginStatus === true)
    {
        document.getElementById('true').style.display='block';
    }
    else
    {
        document.getElementById('false').style.display='block';
    }
}

input.on('focus',function()
{
    topbar.removeClass('error success');
    input.text('');
});

btn.on('click',function()
{
    if(tries<=2)
    {
        var pass = $('#password').val();
        console.log(pass);
        topbar.removeClass('error');
        topbar.removeClass('disabled');
        if(pass==='hello')
        {
            document.getElementById("post1Date").className = "editText";
            document.getElementById("post1Text").className = "editText";
            document.getElementById("post2Date").className = "editText";
            document.getElementById("post2Text").className = "editText";
            document.getElementById("post3Date").className = "editText";
            document.getElementById("post3Text").className = "editText";
            if(loginStatus === false)
            {
                topbar.addClass('disabled');
                setTimeout(function()
                {
                    btn.text('Success!');
                    topbar.addClass('success');
                    input.addClass('disabled');
                    input.prop('disabled',true);
                },200); 
                setTimeout(function()
                {
                    btn.text('Already logged in!');
                    document.getElementById('light').style.display='none';
                    document.getElementById('fade').style.display='none';
                    tries=0;
                    loginStatus = true;
                    console.log(loginStatus);
                },1750);
            }
            else
            {
                btn.text('Already logged in!');
            }
        }
        else
        {
            topbar.addClass('error');
            tries++;
            loginStatus = false;
            console.log(loginStatus);
            switch(tries)
            {
                case 0:
                    btn.text('Login');
                    break;
                case 1:
                    setTimeout(function()
                    {
                        btn.text('Login');
                    },300);
                    break;
                case 2:
                    setTimeout(function()
                    {
                        btn.text('Login');
                    },300);
                    break;
                case 3:
                    setTimeout(function()
                    {
                        btn.text('Access denied');
                        input.prop('disabled',true);
                        topbar.addClass('error');
                        input.addClass('disabled');
                        console.log(loginStatus);
                    },200);
                    setTimeout(function()
                    {
                        document.getElementById('light').style.display='none';
                        document.getElementById('fade').style.display='none';
                    },2000);
                    break;
                defaut:
                    btn.text('Login');
                    break;
            }
        } 
    }
    else
    {
    topbar.addClass('disabled');
    }
});

$('.form').keypress(function(e)
{
    if(e.keyCode==13)
    submit.click();
});

input.keypress(function()
{
    topbar.removeClass('success error');
});