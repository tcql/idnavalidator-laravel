<?php
namespace IDNAValidator;

require_once (\Bundle::path('idnavalidator').'vendor'.DS.'net_idna'.DS.'idna_convert.class.php');

class URL extends \Laravel\URL {
    public static function to($url = '', $https = false)
    {
        $idn = new \idna_convert();
        $validate_url = $idn->encode($url);

        if (filter_var($validate_url, FILTER_VALIDATE_URL) !== false) return $url;

        $root = static::base().'/'.Config::get('application.index');

        // Since SSL is not often used while developing the application, we allow the
        // developer to disable SSL on all framework generated links to make it more
        // convenient to work with the site while developing locally.
        if ($https and Config::get('application.ssl'))
        {
            $root = preg_replace('~http://~', 'https://', $root, 1);
        }

        return rtrim($root, '/').'/'.ltrim($url, '/');
    }
}