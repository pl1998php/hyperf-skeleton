<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Request\Api;

use Hyperf\Validation\Request\FormRequest;

class AuthRequest extends FormRequest
{
    protected array $scenes = [
        'login' => ['phone', 'password'],
    ];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'password' => 'required|min:6|max:20',
        ];
    }
}
