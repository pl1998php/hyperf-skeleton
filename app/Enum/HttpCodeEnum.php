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
namespace App\Enum;

/**
 * HTTP状态码枚举.
 */
enum HttpCodeEnum
{
    /**
     * @Message("OK")
     * 对成功的 GET、PUT、PATCH 或 DELETE 操作进行响应。也可以被用在不创建新资源的 POST 操作上
     */
    public const HTTP_OK = 200;

    /**
     * @Message("Created")
     * 对创建新资源的 POST 操作进行响应。应该带着指向新资源地址的 Location 头
     */
    public const CREATED = 201;

    /**
     * @Message("Accepted")
     * 服务器接受了请求，但是还未处理，响应中应该包含相应的指示信息，告诉客户端该去哪里查询关于本次请求的信息
     */
    public const ACCEPTED = 202;

    /**
     * @Message("No Content")
     * 对不会返回响应体的成功请求进行响应（比如 DELETE 请求）
     */
    public const NO_CONTENT = 203;

    /**
     * @Message("Moved Permanently")
     * 被请求的资源已永久移动到新位置
     */
    public const MOVED_PERMANENTLY = 301;

    /**
     * @Message("Found")
     * 请求的资源现在临时从不同的 URI 响应请求
     */
    public const FOUNT = 302;

    /**
     * @Message("See Other")
     * 对应当前请求的响应可以在另一个 URI 上被找到，客户端应该使用 GET 方法进行请求。比如在创建已经被创建的资源时，可以返回 303
     */
    public const SEE_OTHER = 303;

    /**
     * @Message("Not Modified")
     * HTTP缓存header生效的时候用
     */
    public const NOT_MODIFIED = 304;

    /**
     * @Message("Temporary Redirect")
     * 对应当前请求的响应可以在另一个 URI 上被找到，客户端应该保持原有的请求方法进行请求
     */
    public const TEMPORARY_REDIRECT = 307;

    /**
     * @Message("Bad Request")
     * 请求异常，比如请求中的body无法解析
     */
    public const BAD_REQUEST = 400;

    /**
     * @Message("Unauthorized")
     * 没有进行认证或者认证非法
     */
    public const UNAUTHORIZED = 401;

    /**
     * @Message("Forbidden")
     * 服务器已经理解请求，但是拒绝执行它
     */
    public const FORBIDDEN = 403;

    /**
     * @Message("Not Found")
     * 请求一个不存在的资源
     */
    public const NOT_FOUND = 404;

    /**
     * @Message("Method Not Allowed")
     * 所请求的 HTTP 方法不允许当前认证用户访问
     */
    public const METHOD_NOT_ALLOWED = 405;

    /**
     * @Message("Gone")
     * 表示当前请求的资源不再可用。当调用老版本 API 的时候很有用
     */
    public const GONE = 410;

    /**
     * @Message("Unsupported Media Type")
     * 如果请求中的内容类型是错误的
     */
    public const UNSUPPORTED_MEDIA_TYPE = 415;

    /**
     * @Message("Unprocessable Entity")
     * 用来表示校验错误
     */
    public const UNPROCESSABLE_ENTITY = 422;

    /**
     * @Message("Too Many Requests")
     * 由于请求频次达到上限而被拒绝访问
     */
    public const TOO_MANY_REQUESTS = 429;

    /**
     * @Message("Internal Server Error")
     * 服务器遇到了一个未曾预料的状况，导致了它无法完成对请求的处理
     */
    public const SERVER_ERROR = 500;
}
