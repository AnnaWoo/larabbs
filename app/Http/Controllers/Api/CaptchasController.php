<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);
        $phone = $request->phone;

        // 创建验证码图片
        $captcha = $captchaBuilder->build();
        // 验证码过期时间 2分钟
        $expiredAt = now()->addMinutes(2);
        // getPhrase方法获取验证码文本
        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_image_content' => $captcha->inline()   // inline方法获取的 base64 图片验证码
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
