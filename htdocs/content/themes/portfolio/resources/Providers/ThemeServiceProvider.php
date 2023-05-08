<?php

namespace Theme\Providers;

use Themosis\Support\Facades\Filter;

class ThemeServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Enable SVG uploads
        Filter::add('upload_mimes', [$this, 'addSvgSupport']);
        Filter::add('wp_check_filetype_and_ext', [$this, 'fixSvgUpload'], 10, 4);
    }

    public function addSvgSupport($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }

    public function fixSvgUpload($data, $file, $filename, $mimes): array
    {
        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename'],
        ];
    }
}
