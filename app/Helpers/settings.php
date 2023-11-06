<?php

use App\Models\Setting;

/**
 * Get a setting value.
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function get_setting($key, $default = null)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting) {
        return $setting->value;
    }
    return $default;
}

/**
 * Set a setting value.
 * @param string $key
 * @param mixed $value
 * @return Setting
 */
function set_setting($key, $value)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting) {
        $setting->value = $value;
        $setting->save();
    } else {
        Setting::create(['key' => $key, 'value' => $value]);
    }
    return $setting;
}

/**
 * Clear a setting value.
 * @param string $key
 * @return bool
 */
function clear_setting($key)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting) {
        $setting->delete();
    }
    return true;
}

/**
 * Clear all settings.
 */
function clear_settings()
{
    Setting::truncate();
    return true;
}
