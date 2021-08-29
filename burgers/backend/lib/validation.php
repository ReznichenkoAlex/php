<?php
function validation($name, $email, $phone, $street, $home, $appt)
{
    if ($name === ''){
        echo "Укажите имя";
        return false;
    }
    if ($email === ''){
        echo "Укажите почту";
        return false;
    }
    if ($phone === ''){
        echo "Укажите номер телефона";
        return false;
    }
    if ($street === ''){
        echo "Укажите улицу";
        return false;
    }
    if ($home === ''){
        echo "Укажите номер дома";
        return false;
    }
    if ($appt === ''){
        echo "Укажите квартиру";
        return false;
    }
    return true;
}