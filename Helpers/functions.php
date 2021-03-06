<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Repositories\Contracts\LabelRepositoryInterface;

if ( ! function_exists('format_currency')) {
    function format_currency($amount)
    {
        return number_format((int) $amount, 0, '', ',');
    }
}

if ( ! function_exists('format_date_time')) {
    function format_date_time($date)
    {
        if (App::isLocale('vi')) {
            $format = 'd-m-Y H:i';
        } else {
            $format = 'Y-m-d H:i';
        }

        return date($format, strtotime($date));
    }
}

if ( ! function_exists('format_date')) {
    function format_date($date)
    {
        if (App::isLocale('vi')) {
            $format = 'd-m-Y';
        } else {
            $format = 'Y-m-d';
        }

        return date($format, strtotime($date));
    }
}

if ( ! function_exists('wrap_long_text')) {
    function wrap_long_text($text)
    {
        return wordwrap($text, 100, "<br>");
    }
}

if ( ! function_exists('get_currency')) {
    function get_currency()
    {
        return ' đ';
    }
}

if ( ! function_exists('localize_field')) {
    function localize_field($field)
    {
        return $field . ':' . App::getLocale();
    }
}

if ( ! function_exists('valueByKey')) {
    function valueByKey($collection, $key)
    {
        $item = $collection->where('key', $key)->first();

        return $item ? $item->value : null;
    }
}

if ( ! function_exists('titleByKey')) {
    function titleByKey($collection, $key)
    {
        $item = $collection->where('key', $key)->first();

        return $item ? $item->title : null;
    }
}

if ( ! function_exists('_t')) {
    function _t($key)
    {
        return Cache::tags("label.{$key}")->rememberForever("label.{$key}." . App::getLocale(), function () use ($key) {
            $labelRepository = app(LabelRepositoryInterface::class);

            return $labelRepository->findByColumn($key, 'key')->translate(App::getLocale())->value;
        });
    }
}

if ( ! function_exists('defaultAvatar')) {
    function defaultAvatar()
    {
        return "/skote/assets/images/users/avatar.jpeg";
    }
}

if ( ! function_exists('noImage')) {
    function noImage()
    {
        return "/skote/assets/images/no-image.png";
    }
}

if ( ! function_exists('activeInactiveStatuses')) {
    function activeInactiveStatuses()
    {
        return [
            '1' => _t('active'),
            '0' => _t('inactive'),
        ];
    }
}

if ( ! function_exists('labelHtml')) {
    function labelHtml($statusName, $className)
    {
        return '<label class="badge badge-' . $className . '">' . $statusName . '</label>';
    }
}

if ( ! function_exists('labelSuccessHtml')) {
    function labelSuccessHtml($statusName)
    {
        return labelHtml($statusName, 'success');
    }
}

if ( ! function_exists('labelDangerHtml')) {
    function labelDangerHtml($statusName)
    {
        return labelHtml($statusName, 'danger');
    }
}

if ( ! function_exists('activeInactiveHtml')) {
    function activeInactiveHtml($statusName)
    {
        $successStatus = [_t('active'), _t('publish'), _t('paid'), _t('completed')];
        if (in_array($statusName, $successStatus)) {
            return labelSuccessHtml($statusName);
        }

        return labelDangerHtml($statusName);
    }
}

if ( ! function_exists('yesNoHtml')) {
    function yesNoHtml($bool)
    {
        if ($bool) {
            return '<i class="mdi mdi-check-bold font-size-18 text-success"></i>';
        }

        return '';
    }
}
