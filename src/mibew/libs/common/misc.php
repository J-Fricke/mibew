<?php
/*
 * Copyright 2005-2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function get_gifimage_size($filename)
{
    if (function_exists('gd_info')) {
        $info = gd_info();
        if (isset($info['GIF Read Support']) && $info['GIF Read Support']) {
            $img = @imagecreatefromgif($filename);
            if ($img) {
                $height = imagesy($img);
                $width = imagesx($img);
                imagedestroy($img);

                return array($width, $height);
            }
        }
    }

    return array(0, 0);
}

function div($a, $b)
{
    return ($a - ($a % $b)) / $b;
}

/**
 * Checks if currently processed script is installation script.
 *
 * @return boolean
 */
function installation_in_progress()
{
    if (!defined('INSTALLATION_IN_PROGRESS')) {
        return false;
    }

    return INSTALLATION_IN_PROGRESS;
}