<?

require ("system/config.php");
session_start();
$sid = $_SESSION['hash'];

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$linksite.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$linksite.'" />';
        echo '</noscript>'; exit;
}

$refer = $_GET['p'];
if($refer != '') {
$_SESSION['ref'] = $refer;
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$linksite.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$linksite.'" />';
        echo '</noscript>'; exit;
}

$session_site = $_GET['access'];
if($session_site != '') {
$_SESSION['access'] = $session_site;
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$linksite.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$linksite.'" />';
        echo '</noscript>'; exit;
}

$select_current = "SELECT * FROM users WHERE hash = '$sid'";
$result_current = mysql_query($select_current);
$get = mysql_fetch_array($result_current);
if($get)
{	
$login = $get['login'];
$pass = $get['pass'];
$balance = round($get['balance'], 2);
$id = $get['id'];
$social_link = $get['social'];
$is_admin = $get['admin'];
$is_ban = $get['ban'];
$img = $get['img'];
}

require ("include/header.php");

$rouble = '<svg height="32" width="32" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512 512" xml:space="preserve">
<circle style="fill:#CFF09E;" cx="255.997" cy="255.997" r="167.991"/>
<g>
	<path style="fill:#507C5C;" d="M256,0c-7.664,0-13.877,6.213-13.877,13.877S248.336,27.753,256,27.753
		c57.945,0,110.905,21.716,151.199,57.422l-32.781,32.781C341.468,89.6,299.928,74.132,256,74.132
		c-45.156,0-86.517,16.549-118.35,43.892L95.044,75.42c-0.075-0.075-0.158-0.139-0.235-0.212c-0.071-0.075-0.132-0.154-0.205-0.228
		c-5.417-5.419-14.206-5.419-19.624,0C26.628,123.332,0,187.62,0,256c0,141.159,114.841,256,256,256
		c68.38,0,132.667-26.628,181.02-74.98C485.372,388.668,512,324.38,512,256C512,114.841,397.159,0,256,0z M365.043,147.093
		c5.416,5.423,14.201,5.429,19.624,0.011c0.402-0.402,0.766-0.828,1.109-1.264c0.029-0.029,0.061-0.053,0.09-0.082l40.957-40.957
		c32.834,37.054,53.823,84.82,56.987,137.322h-15.439c-7.664,0-13.877,6.213-13.877,13.877s6.213,13.877,13.877,13.877h15.443
		c-3.047,51.144-22.904,99.082-56.912,137.403l-32.929-32.929c27.344-31.833,43.892-73.193,43.892-118.35
		c0-7.664-6.213-13.877-13.877-13.877s-13.877,6.213-13.877,13.877c0,84.978-69.135,154.115-154.115,154.115
		S101.883,340.979,101.883,256s69.135-154.115,154.115-154.115C297.201,101.885,335.927,117.941,365.043,147.093z M256,453.159
		c-7.664,0-13.877,6.213-13.877,13.877v16.777c-52.502-3.165-100.269-24.154-137.322-56.987l32.849-32.849
		c31.833,27.344,73.193,43.892,118.35,43.892s86.517-16.549,118.35-43.892l32.929,32.929
		c-38.319,34.009-86.259,53.867-137.403,56.912v-16.782C269.877,459.371,263.664,453.159,256,453.159z M28.188,269.877h46.47
		c3.011,39.73,18.85,75.932,43.367,104.473l-32.85,32.849C52.342,370.146,31.353,322.379,28.188,269.877z M85.096,104.72
		l32.929,32.929c-24.517,28.542-40.355,64.743-43.367,104.473H28.182C31.229,190.979,51.087,143.041,85.096,104.72z"/>
	<path style="fill:#507C5C;" d="M278.199,273.687c31.003,0,56.144-25.59,55.407-56.757c-0.716-30.257-26.181-54.087-56.446-54.087
		h-57.289c-3.293,0-5.961,2.668-5.961,5.961v7.868v69.357h-29.567c-3.293,0-5.961,2.668-5.961,5.961v15.735
		c0,3.293,2.668,5.961,5.961,5.961h29.567v16.057h-29.567c-3.293,0-5.961,2.668-5.961,5.961v15.735c0,3.293,2.668,5.961,5.961,5.961
		h29.567V343.1c0,3.346,2.712,6.057,6.057,6.057h15.542c3.346,0,6.057-2.711,6.057-6.057v-25.698h48.213
		c3.293,0,5.961-2.669,5.961-5.961v-15.735c0-3.293-2.668-5.961-5.961-5.961h-48.213v-16.057L278.199,273.687L278.199,273.687z
		 M305.962,218.265c0,15.309-12.456,27.764-27.764,27.764h-36.632v-55.529h36.632C293.507,190.501,305.962,202.955,305.962,218.265z
		"/>
</g>
</svg>';
?>



<body>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit" async defer></script>

<div class="_nuxt_container">

<div class="_nuxt_combined_card mb25 gap20">

<div class="_nuxt_card gap15">
<span class="_nuxt_card_title">Бонус за репост</span>
<div class="_nuxt_card_body gap20">
<span class="_nuxt_bonus_rouble"><?=$rouble?> Награда <b><?=$vkrepostsize?></b> <?=$site_vault?></span>
<hr style="margin: 0;">
<div class="_nuxt_bonus_requests">
<span>Подписаться на <a href="<?=$sitegroup?>">группу ВКонтакте</a></span>
<span>Сделать репост <a href="https://vk.com/">данной записи</a></span>
<span>Продержите запись 24 часа</span>
</div>

<div class="_nuxt_bonus_actions gap15">
<?if(!$get['vkrep']){?>
<button class="_nuxt_button" style="height: 39px;" onClick="vkRepost();">Сделать репост</button>
<?}else{?>
<button class="_nuxt_button" style="height: 39px;" disabled="">Получено</button>
<?}?>
</div>

</div> 
</div> 

<div class="_nuxt_card gap15">
<span class="_nuxt_card_title">Бонус за подписку </span>
<div class="_nuxt_card_body gap20">
<span class="_nuxt_bonus_rouble"><?=$rouble?> Награда <b><?=$vkgroupsize?></b> <?=$site_vault?></span>
<hr style="margin: 0;">
<div class="_nuxt_bonus_requests">
<span>Подписаться на <a href="<?=$sitegroup?>">группу ВКонтакте</a></span>
<span>Сделать репост <a href="https://vk.com/">данной записи</a></span>
<span>Продержите запись 24 часа</span>
</div>

<div class="_nuxt_bonus_actions gap15">
<?if(!$get['vkb']){?>
<button class="_nuxt_button" id="vkbon" style="height: 39px;" onClick="vkBonus();">Проверить подписку</button>
<?}else{?>
<button class="_nuxt_button" style="height: 39px;" disabled="">Получено</button>
<?}?>
</div>

</div> 
</div> 

<div class="_nuxt_card gap15">
<span class="_nuxt_card_title">Бонус за телеграм</span>
<div class="_nuxt_card_body gap20">
<span class="_nuxt_bonus_rouble"><?=$rouble?> Награда <b><?=$tgsize?></b> <?=$site_vault?></span>
<hr style="margin: 0;">
<div class="_nuxt_bonus_requests">
<span>Подписаться на <a href="https://t.me/<?=$sitesupport?>">Telegram канал</a></span>
<span>Подписаться на <a href="<?=$sitegroup?>">группу ВКонтакте</a></span>
<span>Отправить сообщение ниже <a href="https://t.me/lotbetnew_bot">нашему боту</a></span>
</div>

<div class="_nuxt_bonus_actions gap15">
    <?if(!$get['tg']){?>
<input id="tgbot" class="_nuxt_input" value="/bind <?=$id?>" readonly="">
<button class="_nuxt_button" style="height: 39px;width: 250px;" onClick="copyTg();">Скопировать</button>
<?}else{?>
<button class="_nuxt_button" style="height: 39px;" disabled="">Получено</button>
<?}?>
</div>

</div> 
</div> 

</div>    

<div class="_nuxt_card_body gap20" style="height:fit-content;">
<span class="_nuxt_card_title">Промо-коды</span>
<span class="_nuxt_card_promo_desc">Вы можете использовать наши промо-коды для получения бонуса на свой счёт!</span>

<div class="_nuxt_promo_inp gap25">
<input id="promocode" placeholder="Введите промо-код тут">
<button class="_nuxt_button" style="width: 200px;" onClick="go_promocode();">Активировать</button>
</div>

<span class="_nuxt_card_promo_desc2">Промо-коды мы выдаем каждый день в нашем <a href="https://t.me/<?=$sitesupport?>">телеграм канале</a></span>
<div id="promo_captcha"></div>
</div>



<?
require ("include/footer.php");
?> 
  
</div> 
    
<script>
var promoCaptcha;

function recaptchaCallback() {
	promoCaptcha = grecaptcha.render('promo_captcha', {
		'sitekey' : '<?=$grecaptcha?>',
		'theme' : 'dark'
	});	
}    

function vkBonus() {
    $.ajax({
        type: 'POST',
        url: '/server.php',
        data: {
            type: "vkBonus",
        },
        success: function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.success == "success") {
                $('#userBalance').text(obj.new_balance);
                $('#userBalance').attr('myBalance', obj.new_balance);    
                
                $('#vkbon').html('Получено');
                $('#vkbon').css("opacity","0.8");
                greenBalance();
                return toastr['success']("Вы получили 15 монет за подписку на группу","Успешно")
            } else {
                return toastr['error'](obj.error,"Ошибка")
            }
        }
    });
}


function getDaily() {
    $.ajax({
        type: 'POST',
        url: '/server.php',
        beforeSend: function() {},
        data: {
            type: "bonus"
        },
        success: function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.success == "success") {
                greenBalance();
                toastr['success']("Вы получили <b>" + obj.bonussize + "</b> с раздачи","Успешно")
                $('#userBalance').text(obj.new_balance);
                $('#userBalance').attr('myBalance', obj.new_balance);    
            } else {
                return toastr['error'](obj.error,"Ошибка")
            }
        }
    });
}

function vkRepost() {
    $.ajax({
        type: 'POST',
        url: '/server.php',
        data: {
            type: "vkRepost",
        },
        success: function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.success == "success") {
            window.location.href = obj.repost_url;    
            } else {
                return toastr['error'](obj.error,"Ошибка")
            }
        }
    });
}


    function go_promocode() {
if (!grecaptcha.getResponse(promoCaptcha)) {  
    return toastr['error']("Поставьте галочку","Ошибка") 
}else{
    if ($('#promocode').val().length == 0){
    return toastr['error']("Введите промокод","Ошибка")    
    }else{ 
        $.ajax({
            type: 'POST',
            url: 'server.php',
            data: {
                type: "activePromo",
                promoactive: $('#promocode').val()
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                if (obj.success == "success") {
                    toastr['success']('Промокод активирован','Успешно')
                    greenBalance();
                    grecaptcha.reset(promoCaptcha);
                    $('#userBalance').text(obj.new_balance);
                    $('#userBalance').attr('myBalance', obj.new_balance);
                } else {
                    grecaptcha.reset(promoCaptcha);
                    return toastr['error'](obj.error,"Ошибка")
                }
            }
        });
    }
}
}
var botlink_main = document.getElementById("tgbot");
var botlink = $('#tgbot').val();
function copyTg() {
  botlink_main.select();    
  document.execCommand("copy");
  toastr['success']("Скопировали значение: "+botlink,"Успешно")
}    
</script> 
    
</body>
</html>    