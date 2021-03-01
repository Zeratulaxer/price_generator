<?php

namespace App\routing;

class Router
{
    static $rules = [
        'get' => [],
        'post' => []
    ];

    public static function get(string $rule, callable $callback)
    {
        self::$rules['get'][self::toPattern($rule)] = $callback;
    }

    public static function post(string $rule, callable $callback)
    {
        self::$rules['post'][self::toPattern($rule)] = $callback;
    }

    public static function handle(string $method, string $uri)
    {
        $pureUri = rtrim($uri, " \t\n\r\0\x0B\/");

        //todo support POST
        foreach (self::$rules[strtolower($method)] as $pattern => $callback) {
            $matches = [];

            if (preg_match($pattern, $pureUri, $matches) != 0) {
                $args = array_map(function (string $argName) use ($matches) {
                    return array_key_exists($argName, $matches) ? $matches[$argName] : null;
                }, self::getArgumentNames($callback));

                $callback(...$args);

                return;
            }

            unset($matches);
        }

        echo 'Unknown route!';
    }

    /**
     * @param \Closure $func
     * @return string[]
     *
     * @throws \ReflectionException
     */
    private static function getArgumentNames(\Closure $func): array
    {
        return array_map(function ($param) {
            return $param->name;
        }, (new \ReflectionFunction($func))->getParameters());
    }

    private static function toPattern(string $rule): string
    {
        $normalized = preg_replace_callback_array(["/{([^}]*)}/" => function (array $matches) {
            return "(?<$matches[1]>[^/]*)";
        }], $rule);

        return sprintf("/%s$/", str_replace('/', "\/", $normalized));
    }
}
