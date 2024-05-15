<?php
// get country by id
function get_user_country_from_ip2location_api()
{
    $api_url = 'https://api.ip2location.io/v2/?ip=';
    $api_key = 'your_api_key';
    $user_ip = $_SERVER['REMOTE_ADDR'];

    $full_api_url = $api_url . $user_ip . '&key=' . $api_key;

    $response = wp_remote_get($full_api_url);

    if (is_wp_error($response)) {
        return 'Error: Could not get data';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (isset($data->country_code)) {
        return $data->country_code;
    } else {
        return 'Error: Country information not received';
    }
}
// get lang by country
function get_lang(){
    $country=get_user_country_from_ip2location_api();
    if ($country) {
        switch ($country) {
            case "DJ":
            case "ER":
            case "ET":

                $lang = "aa";
                break;

            case "AE":
            case "BH":
            case "DZ":
            case "EG":
            case "IQ":
            case "JO":
            case "KW":
            case "LB":
            case "LY":
            case "MA":
            case "OM":
            case "QA":
            case "SA":
            case "SD":
            case "SY":
            case "TN":
            case "YE":

                $lang = "ar";
                break;

            case "AZ":

                $lang = "az";
                break;

            case "BY":

                $lang = "be";
                break;

            case "BG":

                $lang = "bg";
                break;

            case "BD":

                $lang = "bn";
                break;

            case "BA":

                $lang = "bs";
                break;

            case "CZ":

                $lang = "cs";
                break;

            case "DK":

                $lang = "da";
                break;

            case "AT":
            case "CH":
            case "DE":
            case "LU":

                $lang = "de";
                break;

            case "MV":

                $lang = "dv";
                break;

            case "BT":

                $lang = "dz";
                break;

            case "GR":

                $lang = "el";
                break;

            case "AG":
            case "AI":
            case "AQ":
            case "AS":
            case "AU":
            case "BB":
            case "BW":
            case "CA":
            case "GB":
            case "IE":
            case "KE":
            case "NG":
            case "NZ":
            case "PH":
            case "SG":
            case "US":
            case "ZA":
            case "ZM":
            case "ZW":

                $lang = "en";
                break;

            case "AD":
            case "AR":
            case "BO":
            case "CL":
            case "CO":
            case "CR":
            case "CU":
            case "DO":
            case "EC":
            case "ES":
            case "GT":
            case "HN":
            case "MX":
            case "NI":
            case "PA":
            case "PE":
            case "PR":
            case "PY":
            case "SV":
            case "UY":
            case "VE":

                $lang = "es";
                break;

            case "EE":

                $lang = "et";
                break;

            case "IR":

                $lang = "fa";
                break;

            case "FI":

                $lang = "fi";
                break;

            case "FO":

                $lang = "fo";
                break;

            case "BE":
            case "FR":
            case "SN":

                $lang = "fr";
                break;

            case "IL":

                $lang = "he";
                break;

            case "IN":

                $lang = "hi";
                break;

            case "HR":

                $lang = "hr";
                break;

            case "HT":

                $lang = "ht";
                break;

            case "HU":

                $lang = "hu";
                break;

            case "AM":

                $lang = "hy";
                break;

            case "ID":

                $lang = "id";
                break;

            case "IS":

                $lang = "is";
                break;

            case "IT":

                $lang = "it";
                break;

            case "JP":

                $lang = "ja";
                break;

            case "GE":

                $lang = "ka";
                break;

            case "KZ":

                $lang = "kk";
                break;

            case "GL":

                $lang = "kl";
                break;

            case "KH":

                $lang = "km";
                break;

            case "KR":

                $lang = "ko";
                break;

            case "KG":

                $lang = "ky";
                break;

            case "UG":

                $lang = "lg";
                break;

            case "LA":

                $lang = "lo";
                break;

            case "LT":

                $lang = "lt";
                break;

            case "LV":

                $lang = "lv";
                break;

            case "MG":

                $lang = "mg";
                break;

            case "MK":

                $lang = "mk";
                break;

            case "MN":

                $lang = "mn";
                break;

            case "MY":

                $lang = "ms";
                break;

            case "MT":

                $lang = "mt";
                break;

            case "MM":

                $lang = "my";
                break;

            case "NP":

                $lang = "ne";
                break;

            case "AW":
            case "NL":

                $lang = "nl";
                break;

            case "NO":

                $lang = "no";
                break;

            case "PL":

                $lang = "pl";
                break;

            case "AF":

                $lang = "ps";
                break;

            case "AO":
            case "BR":
            case "PT":

                $lang = "pt";
                break;

            case "RO":

                $lang = "ro";
                break;

            case "RU":
            case "UA":

                $lang = "ru";
                break;

            case "RW":

                $lang = "rw";
                break;

            case "AX":

                $lang = "se";
                break;

            case "SK":

                $lang = "sk";
                break;

            case "SI":

                $lang = "sl";
                break;

            case "SO":

                $lang = "so";
                break;

            case "AL":

                $lang = "sq";
                break;

            case "ME":
            case "RS":

                $lang = "sr";
                break;

            case "SE":

                $lang = "sv";
                break;

            case "TZ":

                $lang = "sw";
                break;

            case "LK":

                $lang = "ta";
                break;

            case "TJ":

                $lang = "tg";
                break;

            case "TH":

                $lang = "th";
                break;

            case "TM":

                $lang = "tk";
                break;

            case "CY":
            case "TR":

                $lang = "tr";
                break;

            case "PK":

                $lang = "ur";
                break;

            case "UZ":

                $lang = "uz";
                break;

            case "VN":

                $lang = "vi";
                break;

            case "CN":
            case "HK":
            case "TW":

                $lang = "zh";
                break;

            default:
                break;
        }
    }

    return $lang;

}


function my_custom_modal_hook()
{
// langs array
    $langs = array(
        'ar' => array(
            'title' => 'عزيزي العميل،',
            'content' => '
				شكرًا لاختيارك لنا لشرائك.
				انقر هنا للدخول إلى صفحة المنتجات.
				لضمان أصالة متجرنا الإلكتروني، يمكنك الاستفسار من موقع الشركة المصنعة الأصلي (olivari.it).
				تواصل مع خبرائنا من خلال صفحة الاتصال بنا لمزيد من المعلومات.
				'

        ),

        'en' => array(
            'title' => 'Dear customer,',
            'content' => "Thank you for choosing us for your purchase.
							Click here to enter the products page.
							To ensure the authenticity of the our webstore, you can inquire from the original manufacturer's website (olivari.it).
							Get in touch with our experts through our contact page for more information."
        ),

        'de' => array(
            'title' => 'Lieber Kunde,',
            'content' => "Vielen Dank, dass Sie uns für Ihren Einkauf gewählt haben.
							Klicken Sie hier, um zur Produktseite zu gelangen.
							Um die Echtheit unseres Webshops sicherzustellen, können Sie sich auf der Website des Originalherstellers (olivari.it) informieren.
							Kontaktieren Sie unsere Experten über unsere Kontaktseite für weitere Informationen."
        )
    );

// set lang content
    $lang = get_lang();
    if (array_key_exists($lang, $langs)) {
        $my_title = $langs[$lang]['title'];
        $my_content = $langs[$lang]['content'];
    } else {
        $my_title = $langs['en']['title'];
        $my_content = $langs['en']['content'];
    }
// modal show
    $cookie_expiry = time() + 86400;
    if (!isset($_COOKIE['custom_modal_shown'])) {
        ?>

        <div class="my-overlay"></div>

        <div class="my-modal">
            <div class="my-modal-content">
                <span class="my-close">&times;</span>
                <h2><?php echo $my_title ?></h2>
                <p><?php echo $my_content ?></p>
            </div>
        </div>
        <style>
            .my-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: none;
                align-content
                z-index: 999;

            }

            .my-modal {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                display: none;
                width: 40%;
                z-index: 9999;

            }

            .my-modal-content {
                text-align: center;
            }

            .my-close {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
                color: darkred;
                font-size: 2rem;
            }

            .my-modal-content h2 {
                font-weight: 700;
                border-bottom: 1px solid lightgray;
                padding-bottom: 1rem;
            }

        </style>
        <script>
            jQuery(document).ready(function () {
                // نمایش مدال
                jQuery('.my-overlay, .my-modal').fadeIn();

                // بستن مدال
                jQuery('.my-close, .my-overlay').on('click', function () {
                    jQuery('.my-overlay, .my-modal').fadeOut();
                });
            });
            document.cookie = 'custom_modal_shown=true; expires=<?php echo gmdate('D, d M Y H:i:s', $cookie_expiry) . ' GMT'; ?>; path=/';

        </script>
        <?php

    }
}

add_action('wp_footer', 'my_custom_modal_hook');
