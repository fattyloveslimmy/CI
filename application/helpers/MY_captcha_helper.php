<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('create_captcha')) {
    function create_captcha($data = '') {
        $defaults = array('word' => '', 'img_width' => '145', 'img_height' => '50', 'fontsize' => 20, 'codelen' => 5, 'font' => '../CI/public/admin/font/Elephant.ttf');
        foreach ($defaults as $key => $val) {
            if (!is_array($data)) {
                if (!isset($$key) OR $$key == '') {
                    $$key = $val;
                }
            } else {
                $$key = (!isset($data[$key])) ? $val : $data[$key];
            }
        }

        //生成随机码
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $_len = strlen($pool) - 1;
        for ($i = 0; $i < $codelen; $i++) {
            $word .= $pool[mt_rand(0, $_len)];
        }

        //生成背景
        // PHP.net recommends imagecreatetruecolor(), but it isn't always available
        if (function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor($img_width, $img_height);
        } else {
            $im = imagecreate($img_width, $img_height);
        }

        $color = imagecolorallocate($im, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
        imagefilledrectangle($im, 0, $img_height, $img_width, 0, $color);

        //生成线条
        for ($i = 0; $i < 6; $i++) {
            $color = imagecolorallocate($im, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imageline($im, mt_rand(0, $img_width), mt_rand(0, $img_height), mt_rand(0, $img_width), mt_rand(0, $img_height), $color);
        }
        //生成雪花
        for ($i = 0; $i < 50; $i++) {
            $color = imagecolorallocate($im, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($im, mt_rand(1, 5), mt_rand(0, $img_width), mt_rand(0, $img_height), '*', $color);
        }

        //生成文字
        $_x = $img_width / $codelen;
        for ($i = 0; $i < $codelen; $i++) {
            $fontcolor = imagecolorallocate($im, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imagettftext($im, $fontsize, mt_rand(-30, 30), $_x * $i + mt_rand(1, 5), $img_height / 1.4, $fontcolor, $font, substr($word, $i, 1));
        }

        //直接输出验证码但不生成图片文件
        header("Content-Type:image/png");
        imagepng($im);

        ImageDestroy($im);

        //返回生成的验证码字符串
        return $word;
    }
}

// ------------------------------------------------------------------------

/* End of file captcha_helper.php */
/* Location: ./system/heleprs/captcha_helper.php */